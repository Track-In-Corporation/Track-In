<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mike', function(){
  return view('components.modalTemp');
});
Route::get('/sideModal', function(){
  return view('components.sideModal');
});
Route::get('/product-form', [ProductController::class, 'productForm'])->name('product-form');
