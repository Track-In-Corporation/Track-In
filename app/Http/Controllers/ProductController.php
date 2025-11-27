<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productForm(){
        return view('pages.ProductForm.index');
    }
}