<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(
        protected ProductService $productService
    ) {}

    public function index(Request $request)
    {
        $filters = $request->only([
            'search',
            'category_id',
            'status',
            'featured',
            'stock',
        ]);

        $products = $this->productService
            ->getFilteredProducts($filters);

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
