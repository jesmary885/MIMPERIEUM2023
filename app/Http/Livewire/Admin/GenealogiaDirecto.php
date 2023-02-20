<?php

namespace App\Http\Livewire\Admin;

use App\Models\Partner;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class GenealogiaDirecto extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    protected $listeners = ['render' => 'render'];

    public function updatingSearch(){
        $this->resetPage();
    }

    public function partner_name ($value){

        $user_refer = Partner::where('user_id',$value)->first();

        if($user_refer) return $user_refer->user->name;
        else return '-';

    }

    public function partner_code ($value){

        $user_refer = Partner::where('user_id',$value)->first();

        if($user_refer) return $user_refer->user->code;
        else return '-';

    }

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

    public function refer_count($value){
        $refers_direct = Partner::where('refer_id',$value)->count(); 
        return $refers_direct;

    }

    public function render()
    {
        $refers_direct = Partner::with('refer')
            ->where('refer_id',auth()->id())
            ->paginate(6); 

        return view('livewire.admin.genealogia-directo',compact('refers_direct'));
    }
}
