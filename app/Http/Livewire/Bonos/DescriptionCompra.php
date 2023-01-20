<?php

namespace App\Http\Livewire\Bonos;

use App\Models\GananciaBono;
use App\Models\Order;
use Livewire\Component;

class DescriptionCompra extends Component
{

    public $isopen = false,$registro;

    public function mount(GananciaBono $registro){

        $this->registro = $registro;

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

  
        $order = Order::where('id',$this->registro->order_id)->first();

        $items = json_decode($order->content);


        return view('livewire.bonos.description-compra',compact('items'));
    }
}
