<?php

namespace App\Http\Livewire\Admin;

use App\Models\Payment;
use App\Models\User;
use Livewire\Component;

class PointsUsersComponents extends Component
{
    public $user;

    public function mount(User $user){
        $this->user = $user;
    }
    public function render()
    {
        return view('livewire.admin.points-users-components')->layout('layouts.admin');
    }

    public function ganancia_puntos(){
        return ($this->user->points * 40)/100;
    }

    public function pago(){

        $total = ($this->user->points * 40)/100;
   
       // $puntos = $this->user->points;

       $pago = new Payment();

       $pago->user_id = $this->user->id;
       $pago->description = 'Bono por compra';
       $pago->total = $total;
       $pago->save();

        $this->user->update([
            'points' => 0,
        ]);

       


    }
}
