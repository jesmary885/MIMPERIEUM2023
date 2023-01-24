<?php

namespace App\Http\Livewire\Admin;

use App\Models\Partner;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class GenealogiaResidual extends Component
{

    use WithPagination;

    protected $paginationTheme = "bootstrap";

    protected $listeners = ['render' => 'render'];

    public function updatingSearch(){
        $this->resetPage();
    }

    public $user, $referidos, $refers, $cant;
    public $gl1, $gl2, $gl3, $gl4, $gl5, $gl6, $gt;

   /* public function mount(){
        $this->user =  Auth::user();

        $this->referidos = Partner::where('refer_id',$this->user->id)->get();

        $ptos_l1 = 0;
        foreach ($this->referidos as $ref1){
            $ptos_l1 = (User::where('id',$ref1->user_id)->first()->points) + $ptos_l1;
        }

        $this->gl1 = (5 * $ptos_l1 ) / 100;
        $this->gt = $this->gl1;
    }*/

    public function puntos_grupales($value){
        $puntos_grupales = 0;
        $user_directos = Partner::where('refer_id',$value)->get(); 
        if($user_directos){
            foreach ($user_directos as $user_directo){//nivel1
                $puntos_grupales = $puntos_grupales + User::where('id',$user_directo->user_id)->first()->points;
                $user_ind0= Partner::where('refer_id',$user_directo->user_id)->get(); 
                if($user_ind0->count()){
                    foreach($user_ind0 as $user_ind2){//nivel2
                        $puntos_grupales = $puntos_grupales + User::where('id',$user_ind2->user_id)->first()->points;
                        $user_ind3= Partner::where('refer_id',$user_ind2->user_id)->get();
                        if($user_ind3->count()){
                            foreach($user_ind3 as $user_ind4){//nivel 3
                                $puntos_grupales = $puntos_grupales + User::where('id',$user_ind4->user_id)->first()->points;
                                $user_ind5= Partner::where('refer_id',$user_ind4->user_id)->get();
                                if($user_ind5->count()){
                                    foreach($user_ind5 as $user_ind6){//nivel4
                                        $puntos_grupales = $puntos_grupales + User::where('id',$user_ind6->user_id)->first()->points;
                                        $user_ind7= Partner::where('refer_id',$user_ind6->user_id)->get();
                                        if($user_ind7->count()){
                                            foreach($user_ind7 as $user_ind8){//nivel5
                                                $puntos_grupales = $puntos_grupales + User::where('id',$user_ind8->user_id)->first()->points;
                                                $user_ind9= Partner::where('refer_id',$user_ind8->user_id)->get();
                                                if($user_ind9->count()){
                                                    foreach($user_ind9 as $user_ind10){//nivel6
                                                        $puntos_grupales = $puntos_grupales + User::where('id',$user_ind10->user_id)->first()->points;
                                                        $user_ind11= Partner::where('refer_id',$user_ind10->user_id)->get();
                                                        if($user_ind11->count()){
                                                            foreach($user_ind11 as $user_ind12){//nivel7
                                                                $puntos_grupales = $puntos_grupales + User::where('id',$user_ind12->user_id)->first()->points;
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        return User::where('id',$value)->first()->points + $puntos_grupales;

    }

    public function count($value){
        return Partner::where('refer_id',$value)->count();

    }

    public function ganancia_puntos(){
        return ($this->user->points * 40)/100;
    }

  /* public function ganancia($value,$nivel){
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
    }*/

    public function nivel($value){
        $user_refer = Partner::where('user_id',$value)->first(); //ubico a la persona en tabla partner
        $cont = 1;
        $act = 0;

        do{
            if($cont == 1){//busco el primer patrocinador por encima de él
                $user_refer2 = Partner::where('user_id',$user_refer->refer_id)->first();
            }
        
            if($user_refer2->refer_id == auth()->id()) {
                $act=1;
                $cont = $cont + 1;
            }

            else{
                $act=0;
                $cont = $cont + 1;
                //voy a buscar el patrocinador de su patrocinador
                $user_refer2 = Partner::where('user_id',$user_refer2->refer_id)->first();
            }
        }
        while($act == 0);

        return $cont;
    }

    public function partner_name ($value){
        $user_refer = Partner::where('user_id',$value)->first();

       /* if($user_refer->isEmpty()) return '-';
        else return $user_refer->refer->name;*/

        if($user_refer) return $user_refer->user->name;
        else return '-';

    }

    public function partner_code ($value){
        $user_refer = Partner::where('user_id',$value)->first();

        if($user_refer) return $user_refer->user->code;
        else return '-';

    }


    public function refers($value){
        $this->refers = Partner::with('refer')->where('refer_id',$value)->get();
        
       if($this->refers->isEmpty()) return 0;
        else return $this->refers;
    }

    public function render()
    {
        $refers_direct = Partner::with('refer')
            ->where('refer_id',auth()->id())
            ->paginate(1);


        return view('livewire.admin.genealogia-residual',compact('refers_direct'));
    }
}
