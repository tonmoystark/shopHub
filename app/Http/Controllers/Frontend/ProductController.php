<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\ProductService;

class ProductController extends Controller
{
    public function __construct(
        protected ProductService $productService
    ) {}

    public function index()
    {
        $products = $this->productService
            ->getFrontendProducts();

        return view(
            'frontend.products.index',
            compact('products')
        );
    }

    public function show(Product $product)
    {
        $product = $this->productService
            ->getProduct($product);

        return view(
            'frontend.products.show',
            compact('product')
        );
    }
}
