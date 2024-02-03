<?php

namespace App\Http\Livewire\Admin\Contenidoweb;

use App\Models\Contenidoweb;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class GanarDineroEdit extends Component
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
        return view('livewire.admin.contenidoweb.ganar-dinero-edit');
    }

    public function save(){
        $rules = $this->rules;
        $this->validate($rules);

        $texto_mod = Contenidoweb::where('area','ganar_dinero')->first();

        if($this->accion == 'edit'){

            if($texto_mod)


            $url = Storage::put('img', $this->file);

            $texto_mod->update([
                'url' => $url, 
            ]);

        }

        else{

            $url = Storage::put('img', $this->file);

            $texto1_mod = new Contenidoweb();
            $texto1_mod->url =  $url;
            $texto1_mod->area =  'ganar_dinero';
            $texto1_mod->save();
        }


        $this->reset(['isopen']);
        $this->emitTo('admin.contenidoweb.ganar-dinero','render');
        $this->emit('alert','Datos procesados correctamente');
    }
}
