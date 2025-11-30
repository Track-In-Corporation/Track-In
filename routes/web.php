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
Route::get('/transaction/form', [TransactionController::class, 'getTransactionForm'])->name('transaction-form');
Route::get('/transactions', [TransactionController::class, 'getTransactions'])->name('transactions');

// Action Routes -> Perform mutations (delete, update, create)
Route::post('/products', [ProductController::class, 'createProduct'])->name('create.product');
Route::delete('/products/{code}', [ProductController::class, 'deleteProduct'])->name('delete.product');

// API Routes
Route::prefix("api")->group(function() {
    Route::get('/products/{code}', [ProductController::class, 'getProduct']);
    Route::get('/transactions/{id}', [TransactionController::class, 'getTransaction']);
});
