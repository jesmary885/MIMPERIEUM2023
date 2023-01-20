<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AddProducts extends Component
{ 
    public $isopen = false, $quantity,$product;

    public $listeners = [
        'hideMe' => 'hideModal'
    ];


    protected $rules = [
        'quantity' => 'required',
    ];

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
        return view('livewire.admin.add-products');
    }

    public function update(){

        $rules = $this->rules;
        $this->validate($rules);

        $quantity_new = $this->product->quantity + $this->quantity;

        $this->product->update([
            'quantity' => $quantity_new
        ]);

        return redirect(route('admin.products'));

       // $this->emitTo('admin.show-product','render');


    }
}
