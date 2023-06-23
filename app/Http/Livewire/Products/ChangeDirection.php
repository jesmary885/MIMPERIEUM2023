<?php

namespace App\Http\Livewire\Products;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChangeDirection extends Component
{
    public $direction,$isopen = false, $user,$referencia,$phone,$departamento,$provincia,$distrito;

    protected $rules = [
        'phone' => 'required',
        'direction' => 'required', 
        'referencia' => 'required', 
        'departamento' => 'required', 
        'provincia' => 'required', 
        'distrito' => 'required', 
    ];

    public function mount(){

        $this->user = User::where('id',Auth::id())->first();
        
        $this->phone = $this->user->phone;
        $this->direction = $this->user->direction;
        $this->referencia = $this->user->referencia;
        $this->departamento = $this->user->departamento;
        $this->provincia = $this->user->provincia;
        $this->distrito = $this->user->distrito;
    }

    public function open()
    {
        $this->isopen = true;  
    }
    public function close()
    {
        $this->isopen = false;  
    }

    public function render()
    {
        return view('livewire.products.change-direction');
    }

    public function save(){

        $rules = $this->rules;
        $this->validate($rules);
      
            $this->user->update([
                'phone' => $this->phone,
                'direction' => $this->direction,
                'referencia' => $this->referencia,
                'departamento' => $this->departamento,
                'provincia' => $this->provincia,
                'distrito' => $this->distrito
            ]);

            $this->reset(['isopen']);
            //$this->emitTo('admin.user-component','render');
            $this->emit('alert','Datos registrados correctamente');
    }
}
