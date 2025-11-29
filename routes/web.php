<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// View Routes
Route::get('/add-form', [ProductController::class, 'addForm'])->name('add-form');
Route::get('/inventory', [ProductController::class, 'getProducts'])->name('inventory');
Route::get('/transactions', [TransactionController::class, 'getTransactions'])->name('transactions');

// API Routes
Route::prefix("api")->group(function() {
    Route::get('/products/{code}', [ProductController::class, 'getProduct']);
    Route::get('/transactions/{id}', [TransactionController::class, 'getTransaction']);
});
