<?php

namespace App\Http\Livewire\Admin\Contenidoweb;

use App\Models\Contenidoweb;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class GanarDinero extends Component
{
    public $videos, $cont_img, $imagen_c;

    protected $listeners = ['render' => 'render'];

    public function mount(){
        $this->imagen_c = Contenidoweb::where('area','ganar_dinero')->first();

      /*  if($this->imagen_c){
            $this->imagen = $this->imagen_c->url;
            $this->cont_img = 'si';
        }
        else $this->cont_img = 'no';*/

    }

    protected $rules = [
        'imagen' => 'required',
    ];


    public function render()
    {

        $this->videos = Contenidoweb::where('area','ganar_dinero')->get() ?? [];

        return view('livewire.admin.contenidoweb.ganar-dinero');
    }

   /* public function update(){

        $rules = $this->rules;
        $this->validate($rules);

        $texto_mod =  Contenidoweb::where('area','ganar_dinero')->first();

        if($this->accion == 'edit'){

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
        $this->emitTo('admin.contenidoweb.ganar-dinero','render');
        $this->emit('alert','Datos procesados correctamente');
    }*/
}
