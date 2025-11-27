<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/add-form/{id}', [ProductController::class, 'addForm'])->name('add-form');
Route::get('/add-form', [ProductController::class, 'addForm'])->name('add-form');