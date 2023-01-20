<?php

namespace App\Http\Livewire\Admin;

use App\Models\Rango;
use App\Models\User;
use Livewire\Component;

class ShowRango extends Component
{

    public function cant($value){

        return User::where('rango_id',$value)->count();

    }
    public function render()
    {
        $rangos = Rango::all();

        return view('livewire.admin.show-rango',compact('rangos'));
    }
}
