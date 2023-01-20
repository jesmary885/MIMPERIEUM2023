<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Admin\ShowProducts;
use App\Http\Livewire\Admin\CreateProduct;
use App\Http\Livewire\Admin\EditProduct;

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\indexController;
use App\Http\Controllers\RangoController;
use App\Http\Controllers\viewsController;
use App\Http\Livewire\Admin\ShowCategory;

use App\Http\Livewire\Admin\BrandComponent;

use App\Http\Livewire\Admin\DepartmentComponent;
use App\Http\Livewire\Admin\ShowDepartment;
use App\Http\Livewire\Admin\CityComponent;
use App\Http\Livewire\Admin\PaymentsUsersComponent;
use App\Http\Livewire\Admin\PaymentUserComponent;
use App\Http\Livewire\Admin\PointsUsersComponents;
use App\Http\Livewire\Admin\PointUserComponent;
use App\Http\Livewire\Admin\ShowUser;
use App\Http\Livewire\Admin\UserComponent;

Route::middleware(['auth'])->group(function(){
    Route::get('users', [viewsController::class, 'usuario_index'])->name('admin.users.index');

    //Route::get('/', [indexController::class, 'index'])->name('admin.index');

    //Route::get('products', ShowProducts::class)->name('admin.products');
    Route::get('products', [viewsController::class, 'producto_index'])->name('admin.products');

    //Route::get('products/create', CreateProduct::class)->name('admin.products.create');
    Route::get('products/create', [viewsController::class, 'producto_create'])->name('admin.products.create');

    //Route::get('products/{product}/edit', EditProduct::class)->name('admin.products.edit');
    Route::get('products/{product}/edit', [viewsController::class, 'producto_edit'])->name('admin.products.edit');

    Route::post('products/{product}/files', [ProductController::class, 'files'])->name('admin.products.files');

    Route::get('orders', [OrderController::class, 'index'])->name('admin.orders.index');
    //Route::get('orders', [viewsController::class, 'orden_index'])->name('admin.orders.index');

    Route::get('orders/{order}', [OrderController::class, 'show'])->name('admin.orders.show');
   // Route::get('orders/{order}', [viewsController::class, 'orden_show'])->name('admin.orders.show');

  // Route::get('categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('categories', [viewsController::class, 'category_index'])->name('admin.categories.index');
    //Route::get('categories/{category}', ShowCategory::class)->name('admin.categories.show');
    Route::get('categories/{category}', [viewsController::class, 'category_show'])->name('admin.categories.show');

    Route::get('brands', [viewsController::class, 'brand_index'])->name('admin.brands.index');
   // Route::get('brands', viewsController::class)->name('admin.brands.index');

   /* Route::get('departments', DepartmentComponent::class)->name('admin.departments.index');
    Route::get('departments/{department}', ShowDepartment::class)->name('admin.departments.show');

    Route::get('cities/{city}', CityComponent::class)->name('admin.cities.show');*/

    //Route::get('users', UserComponent::class)->name('admin.users.index');
    Route::get('users/{user}/residual', ShowUser::class)->name('admin.users.residual');

    Route::get('puntos/{user}', PointsUsersComponents::class)->name('admin.puntos.index');
    Route::get('pagos/{user}', PaymentsUsersComponent::class)->name('admin.pagos.index');
    
    Route::get('rangos', [RangoController::class, 'index'])->name('admin.rangos');

    Route::get('pagos', [RangoController::class, 'pagos'])->name('admin.pagos');

  
    //Route::get('pagos', PaymentUserComponent::class)->name('admin.my_payments.index');
    Route::get('puntos', PointUserComponent::class)->name('admin.my_points.index');

    Route::get('orders/{order}', [OrderController::class, 'show'])->name('admin.orders.show');

});