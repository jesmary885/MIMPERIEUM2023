<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){

        //$orders = Order::query()->where('status', '<>', 1);
        $orders = Order::query();

        if (request('status')) {
            $orders->where('status', request('status'))
            ->where('id', 'LIKE', '%' . request('q') . '%');
        }

        if (request('q')) {
            $orders->where('id', 'LIKE', '%' . request('q') . '%');
        }

        $orders = $orders->Latest('id')->paginate(15);


        $pendiente = Order::where('status', 1)->count();
        $entregado = Order::where('status', 2)->count();
        $anulado = Order::where('status', 3)->count();

        return view('admin.orders.index', compact('orders', 'pendiente', 'entregado', 'anulado'));
    }  

    public function show(Order $order){
        return view('admin.orders.show', compact('order'));
    }
}
