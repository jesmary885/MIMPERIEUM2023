<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use PDF;

class DropdownCart extends Component
{

    protected $listeners = ['render'=>'render'];
    
    public function render()
    {
        return view('livewire.dropdown-cart');
    }

    public function finish(){

  /*     $fecha = date("d-m-Y");

        $order = new Order();

        $order->user_id = auth()->user()->id;
        $order->total = Cart::subtotal();
        $order->content = Cart::content();
        $order->save();

        foreach (Cart::content() as $item) {
            discount($item);
        }

        $data = [
            'productos' => Cart::content(),
            'fecha' => $fecha,
            'nro_orden' => $order->id,  
            'cliente' =>  auth()->user()->name,
            'cliente_code' =>  auth()->user()->code,
        ];

       $pdf = PDF::loadView('order.exportPdf',$data)->output();

       return response()->streamDownload(
        fn () => print($pdf),
       "Pedido de productos.pdf"
        );

        Cart::destroy();*/
    }
}
