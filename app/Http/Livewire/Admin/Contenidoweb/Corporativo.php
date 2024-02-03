<?php

namespace App\Http\Livewire\Admin\Contenidoweb;

use App\Models\Contenidoweb;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Corporativo extends Component
{
    public $texto1, $texto2, $texto3, $imagen, $cont_img,$texto;

    protected $listeners = ['render' => 'render'];

    public function mount(){
        $this->texto = Contenidoweb::where('area','corporativo')->first();

        if($this->texto){

            $this->texto1 = $this->texto->texto1;
            $this->texto2 = $this->texto->texto2;
            $this->texto3 = $this->texto->texto3;

            if($this->texto->url){
                $this->imagen = $this->texto->url;
                $this->cont_img = 'si';
            }
            else $this->cont_img = 'no';

        }

    }


    protected $rules = [
        'texto1' => 'required',
        'texto2' => 'required',
        'texto3' => 'required',
    ];



    public function render()
    {
        return view('livewire.admin.contenidoweb.corporativo');
    }

    public function update(){

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

