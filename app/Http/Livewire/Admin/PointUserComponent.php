<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PointUserComponent extends Component
{

    public function render()
    {
        $user = Auth::user();
        return view('livewire.admin.point-user-component',compact('user'))->layout('layouts.admin');
    }

    public function ganancia_puntos(){
        return (Auth::user()->points * 40)/100;
    }
}
