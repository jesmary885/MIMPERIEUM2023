<?php

namespace App\Http\Livewire\Admin;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use Livewire\WithPagination;

class PaymentsUsersComponent extends Component
{
    use WithPagination;

    public $search,$user;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function mount(User $user){
        $this->user = $user;

    }

    public function render()
    {
        $pagos = Payment::where('user_id', $this->user->id)
                   /* ->where(function($query){
                        $query->where('name', 'LIKE', '%' . $this->search . '%');
                    })*/->paginate(15);

        return view('livewire.admin.payments-users-component',compact('pagos'))->layout('layouts.admin');
    }
}
