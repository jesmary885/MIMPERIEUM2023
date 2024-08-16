<?php

namespace App\Http\Livewire\Admin\Contenidoweb;

use App\Models\Contenidoweb;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class GanarDineroEdit extends Component
{
    use WithFileUploads;

    public  $video,$isopen = false,$accion,$titulo,$url;


    protected $rules = [
        'titulo' => 'required',
        'url' => 'required',
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

        if($this->accion == 'edit'){
            $this->titulo = $this->video->texto1;
            $this->url = $this->video->url;
        }   
        

    }
    public function render()
    {
        return view('livewire.admin.contenidoweb.ganar-dinero-edit');
    }

    public function save(){
  

        $rules = $this->rules;
        $this->validate($rules);

        if($this->accion == 'edit'){

            $this->video->update([
                'texto1' => $this->titulo,
                'url' => $this->url, 
            ]);
            
        }

        else{

            $ima = new Contenidoweb();
            $ima->texto1 =  $this->titulo;
            $ima->url =  $this->url;
            $ima->area =  'ganar_dinero';
            $ima->save();

        }

        $this->reset(['isopen']);
        $this->emitTo('admin.contenidoweb.ganar-dinero','render');
        $this->emit('alert','Datos procesados correctamente');
    }
}
