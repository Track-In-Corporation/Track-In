<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route("inventory");
});

// View Routes -> Redirect to views
Route::get('/inventory', [ProductController::class, 'getProducts'])->name('inventory');
Route::get('/inventory/form', [ProductController::class, 'getProductForm'])->name('product-form');
Route::get('/product/{code}', [ProductController::class, 'editProductForm'])->name('product-edit');
Route::get('/transactions', [TransactionController::class, 'getTransactions'])->name('transactions');
Route::get('/transaction/form', [TransactionController::class, 'getTransactionForm'])->name('transaction-form');
Route::get('/transaction/{id}', [TransactionController::class, 'editTransactionForm'])->name('transaction-edit');
Route::get('/users', [UserController::class, 'getUsers'])->name('users');

// Action Routes -> Perform mutations (delete, update, create)
Route::post('/products', [ProductController::class, 'createProduct'])->name('create.product');
Route::post('/transaction', [TransactionController::class, 'createTransaction'])->name('create.transaction');
Route::delete('/products/{code}', [ProductController::class, 'deleteProduct'])->name('delete.product');
Route::delete('/transactions/{id}', [TransactionController::class, 'deleteTransaction'])->name('delete.transaction');
Route::put('/product/{code}', [ProductController::class, 'updateProduct'])->name('update.product');
Route::put('/transaction/{id}', [TransactionController::class, 'updateTransaction'])->name('update.transaction');


// API Routes
Route::prefix("api")->group(function() {
    Route::get('/products/{code}', [ProductController::class, 'getProduct']);
    Route::get('/transactions/{id}', [TransactionController::class, 'getTransaction']);
    Route::get('/users/{id}', [UserController::class, 'getUser']);
    Route::put('/users/{id}', [UserController::class, 'updateUser']);
    Route::post('/users/{id}/profile-picture', [UserController::class, 'updateProfilePicture']);
    Route::post('/users', [UserController::class, 'createUser']);
});