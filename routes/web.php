<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
// use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isLoggedIn;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'getLogin']);

Route::get('/login', [AuthController::class, 'getLogin'])->name('getLogin');
// Route::get('/register', [AuthController::class, 'getRegister'])->name('getRegister');
Route::post('/login', [AuthController::class, 'login'])->name('login.user');
Route::post('/register', [AuthController::class, 'register'])->name('create.user');
Route::post('/logout', [AuthController::class, 'logout'])->name("logout");


// API Routes
Route::prefix("api")->group(function() {
  Route::get('/products/{code}', [ProductController::class, 'getProduct']);
  Route::get('/transactions/{id}', [TransactionController::class, 'getTransaction']);
    Route::get('/users/{id}', [UserController::class, 'getUser']);
    Route::put('/users/{id}', [UserController::class, 'updateUser']);
    Route::post('/users/{id}/profile-picture', [UserController::class, 'updateProfilePicture']);
    Route::post('/users', [UserController::class, 'createUser']);
  });

Route::middleware([isAdmin::class])->group(function () {
  Route::get('/hiadmin', function() {
    return view('pages.tesadmin');
  });
  Route::post('/products', [ProductController::class, 'createProduct'])->name('create.product');
  Route::delete('/products/{code}', [ProductController::class, 'deleteProduct'])->name('delete.product');
  Route::put('/product/{code}', [ProductController::class, 'updateProduct'])->name('update.product');
});

Route::middleware([isLoggedIn::class])->group(function() {
  // View Routes -> Redirect to views
  Route::get('/inventory', [ProductController::class, 'getProducts'])->name('inventory');
  Route::get('/inventory/form', [ProductController::class, 'getProductForm'])->name('product-form');
  Route::get('/product/{code}', [ProductController::class, 'editProductForm'])->name('product-edit');

  Route::get('/transactions', [TransactionController::class, 'getTransactions'])->name('transactions');
  Route::get('/transaction/form', [TransactionController::class, 'getTransactionForm'])->name('transaction-form');
  Route::get('/transaction/{id}', [TransactionController::class, 'editTransactionForm'])->name('transaction-edit');
  Route::post('/transaction/{id}/status', [TransactionController::class, 'updateTransactionStatus'])->name('transaction-status-edit');
  Route::get('/users', [UserController::class, 'getUsers'])->name('users');
  Route::delete('/users/{id}', [UserController::class, 'deleteUser'])->name('delete.users');

  // Action Routes -> Perform mutations (delete, update, create)
  Route::post('/transaction', [TransactionController::class, 'createTransaction'])->name('create.transaction');
  Route::delete('/transactions/{id}', [TransactionController::class, 'deleteTransaction'])->name('delete.transaction');

  Route::put('/transaction/{id}', [TransactionController::class, 'updateTransaction'])->name('update.transaction');
});

Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'id'])) {
        session(['locale' => $locale]);
      }
    return back();
})->name('lang.switch');
