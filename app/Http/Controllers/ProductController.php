<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\User;

class ProductController extends Controller
{
    public function show(Product $product){

        $user_status = User::where('id',auth()->id())->first()->status;

        return view('products.show', compact('product','user_status'));
    }
}
