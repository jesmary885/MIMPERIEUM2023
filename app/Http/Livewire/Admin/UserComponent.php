<?php

namespace App\Http\Livewire\Admin;

use App\Models\Partner;
use Livewire\Component;
use App\Models\User;

use Livewire\WithPagination;

class UserComponent extends Component
{

    use WithPagination;

    protected $listeners = ['render'];

    public $search;


    public function updatingSearch(){
        $this->resetPage();
    }

    public function assignRole(User $user, $value){

        if ($value == '1') {
            $user->assignRole('admin');
        }else{
            $user->removeRole('admin');
        }

    }

    //propiedad computada
    public function partner($value){

        $partner_id = Partner::where('user_id',$value)->first();

        if($partner_id){
            return User::where('id',$partner_id->refer_id)->first()->name;
        }

        else return '';       
       
    }

    public function render()
    {

        $users = User::where('email', '<>', auth()->user()->email)
                    ->where(function($query){
                        $query->where('name', 'LIKE', '%' . $this->search . '%');
                        $query->orWhere('email', 'LIKE', '%' . $this->search . '%');
                    })->paginate();

        return view('livewire.admin.user-component', compact('users'))->layout('adminlte::page');
    }
}
