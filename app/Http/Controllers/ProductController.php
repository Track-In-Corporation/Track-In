<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addForm(){
        $types = Product::pluck('type')->unique()->values();
        // $product = Product::findOrFail($id);

        // return view('pages.ProductForm.index', compact('types', 'product'));
        return view('pages.ProductForm.index', compact('types'));
    }
}