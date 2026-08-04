<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return view('frontend.products.index');
    }

    public function show(Product $product)
    {
        return view('frontend.products.show', compact('product'));
    }
}
