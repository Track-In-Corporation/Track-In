<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// View Routes
Route::get('/inventory', [ProductController::class, 'getProducts'])->name('inventory');
Route::get('/transactions', [TransactionController::class, 'getTransactions'])->name('transactions');
Route::get('/add-product', [ProductController::class, 'addProduct'])->name('add-product');
Route::post('/add-product', [ProductController::class, 'storeProduct'])->name('store-product');

// API Routes
Route::prefix("api")->group(function() {
    Route::get('/products/{code}', [ProductController::class, 'getProduct']);
    Route::get('/transactions/{id}', [TransactionController::class, 'getTransaction']);
});
