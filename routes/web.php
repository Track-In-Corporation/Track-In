<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mike', function(){
  return view('pages.modalTemp');
});
Route::get('/product-form', [ProductController::class, 'productForm'])->name('product-form');
Route::get('/inventory', [ProductController::class, 'inventory'])->name('inventory');
