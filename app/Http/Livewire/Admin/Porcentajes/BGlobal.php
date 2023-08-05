<?php

namespace App\Http\Livewire\Admin\Porcentajes;

use App\Models\Porcentaje;
use Livewire\Component;

class BGlobal extends Component
{

    public $bono_global_r2,$bono_global_r3,$bono_global_r4,$bono_global_r5;

    protected $rules = [
        'bono_global_r2' => 'required',
        'bono_global_r3' => 'required',
        'bono_global_r4' => 'required',
        'bono_global_r5' => 'required',
    ];

    public function mount(){

        $this->bono_global_r2 = Porcentaje::first()->bono_global_r2;
        $this->bono_global_r3 = Porcentaje::first()->bono_global_r3;
        $this->bono_global_r4 = Porcentaje::first()->bono_global_r4;
        $this->bono_global_r5 = Porcentaje::first()->bono_global_r5;
    }


    public function render()
    {
        return view('livewire.admin.porcentajes.b-global');
    }

    public function save(){

        $rules = $this->rules;
        $this->validate($rules);

        $global = Porcentaje::first();

        $global->update([
            'bono_global_r2' => $this->bono_global_r2,
            'bono_global_r3' => $this->bono_global_r3,
            'bono_global_r4' => $this->bono_global_r4,
            'bono_global_r5' => $this->bono_global_r5,
        ]);

    }
}
