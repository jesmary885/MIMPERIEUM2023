<?php

namespace App\Http\Livewire\Admin\Porcentajes;

use App\Models\Porcentaje;
use Livewire\Component;

class Compra extends Component
{
    public $porcentaje;

    protected $rules = [
        'porcentaje' => 'required',
    ];

    public function mount(){

        $this->porcentaje = Porcentaje::first()->bono_compra;
    }

    public function render()
    {
        return view('livewire.admin.porcentajes.compra');
    }

    public function save(){

        $rules = $this->rules;
        $this->validate($rules);

        $compra = Porcentaje::first();

        $compra->update([
            'bono_compra' => $this->porcentaje,
        ]);

    }
}
