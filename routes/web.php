<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// View Routes -> Redirect to views
Route::get('/inventory', [ProductController::class, 'getProducts'])->name('inventory');
Route::get('/inventory/form', [ProductController::class, 'getProductForm'])->name('product-form');
Route::get('/transactions', [TransactionController::class, 'getTransactions'])->name('transactions');

// Action Routes -> Perform mutations (delete, update, create)
Route::post('/product', [ProductController::class, 'addProduct'])->name('add-product');
Route::delete('/product/{code}', [ProductController::class, 'deleteProduct'])->name('delete-product');

// API Routes
Route::prefix("api")->group(function() {
    Route::get('/products/{code}', [ProductController::class, 'getProduct']);
    Route::get('/transactions/{id}', [TransactionController::class, 'getTransaction']);
});
