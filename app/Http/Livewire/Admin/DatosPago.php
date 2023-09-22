<?php

namespace App\Http\Livewire\Admin;

use App\Models\RetirementAccount;
use App\Models\User;
use Livewire\Component;

class DatosPago extends Component
{
    public $isopen = false,$cuenta;

    public function mount(User $usuario){
        $this->cuenta = RetirementAccount::where('user_id',$usuario->id)->first();
    }

    public function open()
    {
        $this->isopen = true;  
    }
    public function close()
    {
        $this->isopen = false;  
    }

    public function render()
    {
        return view('livewire.admin.datos-pago');
    }
}
