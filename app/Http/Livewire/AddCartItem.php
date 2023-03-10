<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;

class AddCartItem extends Component
{
    public $product, $quantity;
    public $qty = 1;
    public $options = [
        'points' => null,
    ];

    public function mount(){
        $this->quantity = qty_available($this->product->id);
        if($this->product->images->count())$this->options['image'] = Storage::url($this->product->images->first()->url);
        else $this->options['image'] = '';
        $this->options['points'] = $this->product->points;
        $this->options['category'] = $this->product->subcategory->category->id;
        
    }

    public function decrement(){
        $this->qty = $this->qty - 1;
    }

    public function increment(){
        $this->qty = $this->qty + 1;
    }

    public function addItem(){
        Cart::add([ 'id' => $this->product->id, 
                    'name' => $this->product->name, 
                    'qty' => $this->qty, 
                    'price' => $this->product->price, 
                    'weight' => 550,
                    'options' => $this->options
                ]);

        $this->quantity = qty_available($this->product->id);

        $this->reset('qty');

        $this->emitTo('dropdown-cart', 'render');
    }

    public function render()
    {
        return view('livewire.add-cart-item');
    }

    
}
