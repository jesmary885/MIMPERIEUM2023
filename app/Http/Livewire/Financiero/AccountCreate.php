<?php

namespace App\Http\Livewire\Financiero;

use App\Models\RetirementAccount;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class AccountCreate extends Component
{
    public $name,$name_bank,$type,$number,$iban,$bic,$status,$comments,$image;
    public $isopen = false;
    public $action,$cuenta;

    use WithFileUploads;

    protected $listeners = ['render' => 'render'];

    protected $rules = [
        'name' => 'required',
        'type' => 'required',
        'iban' => 'required',
        'bic' => 'required',
        //'image' => 'required|image|max:1024',
    ];

    public function mount(RetirementAccount $cuenta){
        $this->cuenta = $cuenta;
        if($cuenta){
           $this->name = $this->cuenta->name;
           $this->type = $this->cuenta->type;
           $this->number = $this->cuenta->number;
           $this->iban = $this->cuenta->iban;
           $this->bic = $this->cuenta->bic;
           $this->status = $this->cuenta->status;
           $this->comments = $this->cuenta->comments;
          // $this->image = $this->cuenta->image;
        }
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
        return view('livewire.financiero.account-create');
    }

    public function save(){
        $rules = $this->rules;
        $this->validate($rules);

        if($this->action == 'crear')
        {
            
            $cuenta = new RetirementAccount();
            $cuenta->name = $this->name;
            $cuenta->type = $this->type;
            $cuenta->number = $this->number;
            $cuenta->iban = $this->iban;
            $cuenta->bic = $this->bic;
            $cuenta->status = $this->status;
            $cuenta->comments = $this->comments;
            $cuenta->user_id = auth()->id();
            $cuenta->status = 'verificada';
            $cuenta->save();

            $this->reset(['name','isopen','name_bank','type','number','iban','bic','comments']);
        }
        else
        {


            $this->cuenta->update([
                'name' => $this->name,
                'name_bank' => $this->name_bank,
                'type' => $this->type,
                'number' => $this->number,
                'iban' => $this->iban,
                'bic' => $this->bic,
                'status' => $this->status,
                'comments' => $this->comments,

            ]);
            $this->reset(['isopen']);
            $this->emitTo('financiero.account','render');
        }
    }
}
