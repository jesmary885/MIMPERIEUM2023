<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class AlertOrder extends Component
{
    protected $listeners = ['render'=>'render'];

    public function render()
    {
        $ordenes_pendientes = Order::where('status','1')->count();

        $orders = Order::where('status','1')->get();

        $order_total = Order::where('status','1')->sum('total');

        return view('livewire.alert-order',compact('orders','order_total','ordenes_pendientes'));
    }
}
