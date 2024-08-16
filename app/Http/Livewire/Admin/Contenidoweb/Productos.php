<?php

namespace App\Http\Livewire\Admin\Contenidoweb;

use App\Models\Contenidoweb;
use Livewire\Component;

class Productos extends Component
{
    public $texto1, $imagenes;

    protected $listeners = ['render' => 'render'];


    protected $rules = [
        'texto1' => 'required',
    ];

    public function mount(){


        $texto = Contenidoweb::where('area','texto_productos')->first();

        if($texto){
            $this->texto1 = $texto->texto1;
        }
       
    }

    public function render()
    {
        $this->imagenes = Contenidoweb::where('area','productos')->get() ?? [];
        
        return view('livewire.admin.contenidoweb.productos');
    }

    public function update(){

        $rules = $this->rules;
        $this->validate($rules);

        $texto1_mod = Contenidoweb::where('area','texto_productos')->first();

        if($texto1_mod ){
            $texto1_mod->update([
                'texto1' => $this->texto1,
            ]);
        }

        else{
            $texto1_mod = new Contenidoweb();
            $texto1_mod->texto1 =  $this->texto1;
            $texto1_mod->area =  'texto_productos';
            $texto1_mod->save();
        }

  
        $this->emitTo('admin.contenidoweb.productos','render');
        $this->emit('alert','Dato modificado correctamente');
    }

}
