<?php

namespace App\Http\Livewire\Admin\Porcentajes;

use App\Models\Porcentaje;
use Livewire\Component;

class Residual extends Component
{

    public $bono_residual_n1,$bono_residual_n2, $bono_residual_n3, $bono_residual_n4, $bono_residual_n5, $bono_residual_n6;

    protected $rules = [
        'bono_residual_n1' => 'required',
        'bono_residual_n2' => 'required',
        'bono_residual_n3' => 'required',
        'bono_residual_n4' => 'required',
        'bono_residual_n5' => 'required',
        'bono_residual_n6' => 'required',
    ];

    public function mount(){

        $this->bono_residual_n1 = Porcentaje::first()->bono_residual_n1;
        $this->bono_residual_n2 = Porcentaje::first()->bono_residual_n2;
        $this->bono_residual_n3 = Porcentaje::first()->bono_residual_n3;
        $this->bono_residual_n4 = Porcentaje::first()->bono_residual_n4;
        $this->bono_residual_n5 = Porcentaje::first()->bono_residual_n5;
        $this->bono_residual_n6 = Porcentaje::first()->bono_residual_n6;
    }


    public function render()
    {
        return view('livewire.admin.porcentajes.residual');
    }


    public function save(){

        $rules = $this->rules;
        $this->validate($rules);

        $residual = Porcentaje::first();

        $residual->update([
            'bono_residual_n1' => $this->bono_residual_n1,
            'bono_residual_n2' => $this->bono_residual_n2,
            'bono_residual_n3' => $this->bono_residual_n3,
            'bono_residual_n4' => $this->bono_residual_n4,
            'bono_residual_n5' => $this->bono_residual_n5,
            'bono_residual_n6' => $this->bono_residual_n6,
        ]);

    }


}
