<?php

namespace App\Http\Livewire\Financiero;

use App\Models\RetirementAccount;
use Livewire\Component;
use Livewire\WithPagination;

class Account extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    protected $listeners = ['render' => 'render'];

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $cuenta= RetirementAccount::where('user_id',auth()->id())
            ->first();

        return view('livewire.financiero.account',compact('cuenta'));
    }
}
