<?php

namespace App\Http\Livewire\Admin\Contenidoweb;

use App\Models\Contenidoweb;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Corporativo extends Component
{
    public $texto1, $texto2, $texto3, $imagen, $cont_img,$texto,$accion;

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



        $texto1_mod = Contenidoweb::where('area','corporativo')->first();

        if($texto1_mod){
            $texto1_mod->update([
                'texto1' => $this->texto1,
                'texto2' => $this->texto2,
                'texto3' => $this->texto3,
            ]);
        }
        else{

            $texto1_mod = new Contenidoweb();
            $texto1_mod->texto1 =  $this->texto1;
            $texto1_mod->texto2 =  $this->texto2;
            $texto1_mod->texto3 =  $this->texto3;
            $texto1_mod->area =  'corporativo';
            $texto1_mod->save();

        }

        $this->emitTo('admin.contenidoweb.corporativo','render');
        $this->emit('alert','Datos procesados correctamente');
    }

}

