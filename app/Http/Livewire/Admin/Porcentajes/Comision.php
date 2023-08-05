<?php

namespace App\Http\Livewire\Admin\Porcentajes;

use App\Models\Porcentaje;
use Livewire\Component;

class Comision extends Component
{
    public $monto;

    protected $rules = [
        'monto' => 'required',
    ];

    public function mount(){

        $this->monto = Porcentaje::first()->monto_activacion;
    }

    public function render()
    {
        return view('livewire.admin.porcentajes.comision');
    }

    public function save(){

        $rules = $this->rules;
        $this->validate($rules);

        $monto = Porcentaje::first();

        $monto->update([
            'monto_activacion' => $this->monto,
        ]);

    }
}
