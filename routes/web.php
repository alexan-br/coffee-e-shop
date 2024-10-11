<?php

use App\Http\Controllers\ProductController;
use App\Livewire\ProductDetail;
use Illuminate\Support\Facades\Route;

Route::view('/shop', 'shop')->name('shop');


Route::resource('/dashboard/products', ProductController::class);

Route::view('/product/{productId}', 'shop')->name('product.show');
