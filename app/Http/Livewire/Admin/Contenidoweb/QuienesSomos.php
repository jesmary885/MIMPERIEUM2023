<?php

namespace App\Http\Livewire\Admin\Contenidoweb;

use App\Models\Contenidoweb;
use Livewire\Component;

class QuienesSomos extends Component
{

    public $texto1, $imagenes;

    protected $listeners = ['render' => 'render'];


    protected $rules = [
        'texto1' => 'required',
    ];

    public function mount(){
        $texto = Contenidoweb::where('area','texto_quienes_somos')->first();

        if($texto){
            $this->texto1 = $texto->texto1;
        }
       
    }

    public function render()
    {
        $this->imagenes = Contenidoweb::where('area','imagenes_quienes_somos')->get() ?? [];
        return view('livewire.admin.contenidoweb.quienes-somos');
    }

    public function update(){

        $rules = $this->rules;
        $this->validate($rules);

        $texto1_mod = Contenidoweb::where('area','texto_quienes_somos')->first();

 

        if($texto1_mod){
            $texto1_mod->update([
                'texto1' => $this->texto1,
            ]);
        }
        else{

            $texto1_mod = new Contenidoweb();
            $texto1_mod->texto1 =  $this->texto1;
            $texto1_mod->area =  'texto_quienes_somos';
            $texto1_mod->save();

        }

        $this->emitTo('admin.contenidoweb.quienes-somos','render');
        $this->emit('alert','Dato modificado correctamente');
    }
}
