<?php

namespace App\Http\Livewire\Admin;

use App\Models\Partner;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Livewire\Component;

class EditUsers extends Component
{
    public $isopen = false, $user,$status,$roles, $roles_id,$codigo;

    protected $rules = [
        'codigo' => 'required',
        'status' => 'required|max:30',
        'roles_id' => 'required',
    ];

    public function mount(){

        $patrocinador = Partner::where('user_id',$this->user->id)->first()->refer_id; 
        $this->codigo = User::where('id',$patrocinador)->first()->code;
        $this->status = $this->user->status;
        $this->roles_id = $this->user->roles->first()->id;
        $this->roles=Role::all();
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
        return view('livewire.admin.edit-users');
    }

    public function save(){

        $rules = $this->rules;
        $this->validate($rules);

        $codigo_select = User::where('code',$this->codigo)->first();

        if($codigo_select){
            $this->user->update([
                'status' => $this->status
            ]);

            $this->user->roles()->sync($this->roles_id);

            $user_partner = Partner::where('user_id',$this->user->id)->first();
            $user_partner->update([
                'refer_id' => $codigo_select->id,
                'status' => $this->status
            ]); 

            $this->reset(['isopen']);
            $this->emitTo('admin.user-component','render');
            $this->emit('alert','Datos modificados correctamente');
        }

        else{
            $this->emit('errorSize','El código de patrocinador ingresado no existe');
        }

    }
}
