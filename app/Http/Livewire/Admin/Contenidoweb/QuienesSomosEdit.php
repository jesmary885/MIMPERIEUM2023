<?php

namespace App\Http\Livewire\Admin\Contenidoweb;

use App\Models\Contenidoweb;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class QuienesSomosEdit extends Component
{

    use WithFileUploads;

    public $titulo_imagen, $imagen, $file ,$isopen = false,$accion, $file_old;

    protected $rules = [
        'titulo_imagen' => 'required',
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
        if($this->accion == 'edit'){
            $this->titulo_imagen = $this->imagen->texto1;
            $this->file = $this->imagen->url;

            $this->file_old = $this->imagen->url;
        }        

    }

    public function render()
    {
        return view('livewire.admin.contenidoweb.quienes-somos-edit');
    }

    public function save(){

        $rules = $this->rules;
        $this->validate($rules);

        if($this->accion == 'edit'){

           if($this->file_old != $this->file){
            $url = Storage::put('img', $this->file);

            $this->imagen->update([
                'texto1' => $this->titulo_imagen,
                'url' => $url, 
            ]);
           }

           else{
                $this->imagen->update([
                    'texto1' => $this->titulo_imagen,
                ]);
           }
           
        }

        else{

            $url = Storage::put('img', $this->file);

            $ima = new Contenidoweb();
            $ima->texto1 =  $this->titulo_imagen;
            $ima->url =  $url;
            $ima->area =  'imagenes_quienes_somos';
            $ima->save();

        }

        $this->reset(['isopen']);
        $this->emitTo('admin.contenidoweb.quienes-somos','render');
        $this->emit('alert','Datos procesados correctamente');
    }
}
