<?php

namespace App\Http\Livewire\Admin;

use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

use Livewire\Component;

class PaymentUserComponent extends Component
{
    use WithPagination;

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {

        $pagos = Payment::where('user_id', Auth::user()->id)
                   /* ->where(function($query){
                        $query->where('name', 'LIKE', '%' . $this->search . '%');
                    })*/->paginate(15); 

        return view('livewire.admin.payment-user-component',compact('pagos'))->layout('vendor.adminlte.page');
    }
}
