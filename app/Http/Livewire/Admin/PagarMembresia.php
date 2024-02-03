<?php

namespace App\Http\Livewire\Admin;

use App\Models\PagosMembresia;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class PagarMembresia extends Component
{
    use WithFileUploads;

    public $isopen,$file,$comentario;

    protected $listeners = ['render' => 'render'];

    protected $rules = [
        'file' => 'required',
        'comentario' => 'required',
    ];

    public function open()
    {
        $this->isopen = true;  
        //$this->emitTo('admin.pagar-membresia','render');
    }
    public function close()
    {
        $this->isopen = false;  

    }

    public function mount(){
    
    }

    public function render()
    {
        return view('livewire.admin.pagar-membresia');
    }

    public function save(){

        $rules = $this->rules;
        $this->validate($rules);

        $url = $this->file->store('pdfs');

        $pago = new PagosMembresia();
        $pago->constancia = $url;
        $pago->comentario = $this->comentario;
        $pago->status = 'pendiente';
        $pago->user_id= auth()->id();
        $pago->save();

        $user = User::where('id',auth()->id())->first();

        $user->update([
            'status' => 'en espera de aprobacion'
        ]);

        $this->emit('alert','Datos registrados correctamente');
        $this->reset(['comentario','file']);
        $this->isopen = false;  

        return redirect()->route("home");

    }
}
