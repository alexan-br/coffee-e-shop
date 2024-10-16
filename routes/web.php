<?php

use App\Http\Controllers\ProductController;
use App\Livewire\ProductDetail;
use Illuminate\Support\Facades\Route;

Route::view('/', 'shop')->name('shop');


Route::resource('/dashboard/products', ProductController::class);

Route::view('/product/{productId}', 'shop')->name('product.show');

Route::get('/session/quantities', function () {
    if (app()->environment('local')) {
        return response()->json(session()->get('quantities', []));
    }
    abort(403);
});
