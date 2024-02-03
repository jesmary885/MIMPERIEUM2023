<?php

namespace App\Http\Livewire\Admin\Contenidoweb;

use App\Models\Contenidoweb;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductosEdit extends Component
{
    use WithFileUploads;

    public $titulo_imagen, $descripcion, $imagen, $file ,$isopen = false,$accion, $file_old;

    protected $rules = [
        'titulo_imagen' => 'required',
        'descripcion' => 'required',
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
            $this->descripcion = $this->imagen->texto2;
            $this->file = $this->imagen->url;
            $this->file_old = $this->imagen->url;
        }        

    }

    public function render()
    {
        return view('livewire.admin.contenidoweb.productos-edit');
    }

    public function save(){

        $rules = $this->rules;
        $this->validate($rules);

        if($this->accion == 'edit'){

            if($this->file_old != $this->file){

                $url = Storage::put('img', $this->file);

                $this->imagen->update([
                    'texto1' => $this->titulo_imagen,
                    'texto2' => $this->descripcion,
                    'url' => $url, 
                ]);
            }
            else{
                $this->imagen->update([
                    'texto1' => $this->titulo_imagen,
                    'texto2' => $this->descripcion,
                ]);
            }
        }

        else{

            $url = Storage::put('img', $this->file);

            $ima = new Contenidoweb();
            $ima->texto1 =  $this->titulo_imagen;
            $ima->texto2 =  $this->descripcion;
            $ima->url =  $url;
            $ima->area =  'productos';
            $ima->save();

        }

        $this->reset(['isopen']);
        $this->emitTo('admin.contenidoweb.productos','render');
        $this->emit('alert','Datos procesados correctamente');
    }
}
