<?php

namespace App\Http\Livewire\Admin;

use App\Models\Partner;
use App\Models\Payment;
use App\Models\User;
use Livewire\Component;

class ShowUser extends Component
{
    public $user, $referidos, $refers, $cant;
    public $gl1, $gl2, $gl3, $gl4, $gl5, $gl6, $gt;

    protected $listeners = ['render' => 'render'];

    public function mount(User $user){
        $this->user = $user;

        $this->referidos = Partner::where('refer_id',$this->user->id)->get();

        $ptos_l1 = 0;
        foreach ($this->referidos as $ref1){
            $ptos_l1 = (User::where('id',$ref1->user_id)->first()->points) + $ptos_l1;
        }

        $this->gl1 = (5 * $ptos_l1 ) / 100;
        $this->gt = $this->gl1;
    }

    public function count($value){
        return Partner::where('refer_id',$value)->count();

    }

    public function ganancia_puntos(){
        return ($this->user->points * 40)/100;
    }

    public function ganancia($value,$nivel){
        $refer = Partner::where('refer_id',$value)->get();

        $ptos = 0;
        foreach ($refer as $ref){
            $ptos = (User::where('id',$ref->user_id)->first()->points) + $ptos;
        }

        if($nivel == 2){
           $this->gl2 = (6 * $ptos ) / 100;
        }

        if($nivel == 3){
            $this->gl3 = (7 * $ptos ) / 100;
        }

        if($nivel == 4){
            $this->gl4 = (8 * $ptos ) / 100;
        }

        if($nivel == 5){
            $this->gl5 = (9 * $ptos ) / 100;
        }

        if($nivel == 6){
            $this->gl6 = (10 * $ptos ) / 100;
        }
    }


    public function refers($value){
        $this->refers = Partner::where('refer_id',$value)->get();
        
        if($this->refers->isEmpty()) return 'vacia';
        else return $this->refers;
    }

    public function pago(){


       /* $pagos = Payment::where('user_id',$this->user->id)
            ->where('created_at',)*/

        $pago = new Payment();

        $pago->user_id = $this->user->id;
        $pago->description = 'Bono residual';
        $pago->total = $this->gl1 + $this->gl2 + $this->gl3 + $this->gl4 + $this->gl5 + $this->gl6;
        $pago->save();
    }


    
    public function render()
    {
        return view('livewire.admin.show-user')->layout('layouts.admin');
    }
}
