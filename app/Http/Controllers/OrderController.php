<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{

    public function index(){

        $orders = Order::query()->where('user_id', auth()->user()->id);

        if (request('status')) {
            $orders->where('status', request('status'));
        }

        if (request('q')) {
            $orders->where('id', 'LIKE', '%' . request('q') . '%');
        }

        $orders = $orders->Latest('id')->paginate(15);



        $pendiente = Order::where('status', 1)->where('user_id', auth()->user()->id)->count();
        $recibido = Order::where('status', 2)->where('user_id', auth()->user()->id)->count();
        $anulado = Order::where('status', 3)->where('user_id', auth()->user()->id)->count();


        return view('orders.index', compact('orders', 'pendiente', 'recibido','anulado'));
    }

    public function show(Order $order){

        $this->authorize('author', $order);

        $items = json_decode($order->content);
       // $envio = json_decode($order->envio);

        return view('orders.show', compact('order', 'items'));
    }


    public function pay(Order $order, Request $request){

        $this->authorize('author', $order);

        $payment_id = $request->get('payment_id');

        $response = Http::get("https://api.mercadopago.com/v1/payments/$payment_id" . "?access_token=APP_USR-2966754438242803-052115-15da96c087a2fc4d07794f08fe496606-763006654");

        $response = json_decode($response);

        $status = $response->status;

        if($status == 'approved'){
            $order->status = 2;
            $order->save();
        }

        return redirect()->route('orders.show', $order);
    }

    public function received(Order $order){

        $order->update([
            'status' => 2
        ]);

        return redirect()->route('orders.index');
    }

    public function cancel(Order $order){

        $order->update([
            'status' => 3
        ]);

        $items = json_decode($order->content);

        foreach($items as $item){
            $producto = Product::where('id',$item->id)->first();
            $new_quantity = $producto->quantity + $item->qty;

            $producto->update([
                'quantity' => $new_quantity,
            ]);
        }

        return redirect()->route('orders.index');
    }
}
