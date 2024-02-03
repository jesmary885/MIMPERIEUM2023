<?php

namespace App\Http\Livewire\Admin\Contenidoweb;

use App\Models\Contenidoweb;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class CorporativoEdit extends Component
{
    use WithFileUploads;

    public  $imagen, $file ,$isopen = false,$accion;

    protected $rules = [
        'file' => 'required',
    ];

    public function open()
    {
        $this->isopen = true;  
    }
    public function close()
    {
        $this->isopen = false;  
    }


    public function mount(){
        

    }

    public function render()
    {
        return view('livewire.admin.contenidoweb.corporativo-edit');
    }

    public function save(){
        $rules = $this->rules;
        $this->validate($rules);

        $texto_mod = Contenidoweb::where('area','corporativo')->first();

        if($this->accion == 'edit'){

            if($texto_mod)


            $url = Storage::put('img', $this->file);

            $texto_mod->update([
                'url' => $url, 
            ]);

        }

        else{

            $url = Storage::put('img', $this->file);

            $texto_mod->update([
                'url' => $url, 
            ]);
        }

        


        $this->reset(['isopen']);
        $this->emitTo('admin.contenidoweb.corporativo','render');
        $this->emit('alert','Datos procesados correctamente');
    }
}
