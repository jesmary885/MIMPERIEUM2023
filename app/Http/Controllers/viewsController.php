<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class viewsController extends Controller
{
    //usuarios amin
    public function usuario_index(){
        return view('office.admin.user_index');
    }

    //productos admin
    public function producto_index(){
        return view('office.admin.product_index');
    }
    public function producto_create(){
        return view('office.admin.product_create');
    }
    public function producto_edit(Product $product){
        return view('office.admin.product_edit',compact('product'));
    }

    //categorias admin

    public function category_index(){
        return view('office.admin.category_index');
    }
    public function category_show(Category $category){
        return view('office.admin.category_show',compact('category'));
    }

    //marcas admin

    public function brand_index(){
        return view('office.admin.brand_index');
    }

    //ordenes admin

    public function orden_index(){
        return view('office.admin.orden_index');
    }
    public function orden_show(Order $order){
        return view('office.admin.orden_show',compact('order'));
    }

    //Tienda

    public function tienda_index(){
        return view('office.tienda.index');
    }

    //Tienda - mis ordenes

    public function tienda_ordenes(){
        return view('office.tienda.ordenes');
    }
    
}
