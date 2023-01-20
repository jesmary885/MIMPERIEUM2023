<?php

use App\Http\Controllers\Admin\indexController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RangoController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\viewsController;
use App\Http\Livewire\ShoppingCart;
use App\Http\Livewire\CreateOrder;

use App\Http\Livewire\PaymentOrder;

use App\Http\Controllers\WebhooksController;
use App\Models\Order;

Route::get('/', function () {
    return view('dashboard');
});

/*
Route::post('/registro', 'RegisterController@create')->name('Registro_create');
Route::get('/registro', 'RegisterController@index')->name('Registro');*/
//Route::get('/admin/login','AdminAuthController@getLogin');

Route::get('/registro/{code?}', [RegisterController::class, 'index'])->name('Registro');
Route::post('/registro', [RegisterController::class, 'create'])->name('Registro_create');


Route::middleware(['auth'])->group(function(){
    Route::get('/home', [indexController::class, 'index'])->name('home');

    Route::get('/tienda', WelcomeController::class)->name('tienda');

    Route::get('search', SearchController::class)->name('search');

    Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

    Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');

    //Route::get('shopping-cart', ShoppingCart::class)->name('shopping-cart');
    Route::get('shopping-cart', [viewsController::class, 'tienda_index'])->name('shopping-cart');

    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');

    Route::get('orders/create', CreateOrder::class)->name('orders.create');

    Route::get('orders/{order}', [OrderController::class, 'show'])->name('orders.show');

    Route::get('orders/received/{order}', [OrderController::class, 'received'])->name('orders.received');

    Route::get('orders/canceled/{order}', [OrderController::class, 'cancel'])->name('orders.cancel');

    //Route::get('orders/{order}/received', PaymentOrder::class)->name('orders.payment');

    //Route::get('orders/{order}/pay', [OrderController::class, 'pay'])->name('orders.pay');

    Route::post('webhooks', WebhooksController::class);

    Route::get('genealogia_residual', [RangoController::class, 'genealogia_residual'])->name('admin.genealogia_residual');
    Route::get('genealogia_directos', [RangoController::class, 'genealogia_directo'])->name('admin.genealogia_directo');

    Route::get('bono_compra', [RangoController::class, 'bono_compra'])->name('admin.bono_compra');
    Route::get('bono_residual', [RangoController::class, 'bono_residual'])->name('admin.bono_residual');
    Route::get('bono_global', [RangoController::class, 'bono_global'])->name('admin.bono_global');

    Route::get('balance', [RangoController::class, 'balance'])->name('admin.balance');
    Route::get('retiro', [RangoController::class, 'retiro'])->name('admin.retiro');
    Route::get('cuentas', [RangoController::class, 'cuentas'])->name('admin.cuentas');
    Route::get('solicitud_retiro', [RangoController::class, 'solicitud'])->name('admin.solicitud');
});