<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    public function __construct(
        protected ProductService $productService,
        protected CategoryService $categoryService,
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

        $categories = $this->categoryService
            ->getForSelect();

        return view('admin.products.index', [
            'products' => $products,
            'categories' => $categories,
            'search' => $filters['search'] ?? null,
            'category' => $filters['category_id'] ?? null,
            'status' => $filters['status'] ?? null,
            'featured' => $filters['featured'] ?? null,
            'stock' => $filters['stock'] ?? null,
        ]);
    }
    public function create()
    {
        $categories = Category::orderBy('name')
            ->get();

        return view(
            'admin.products.create',
            compact('categories')
        );
    }

    public function store(StoreProductRequest $request)
    {
        $this->productService->store(
            $request->validated()
        );

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        $categories = Category::orderBy('name')
            ->get();

        $product->load('images');

        return view(
            'admin.products.edit',
            compact(
                'product',
                'categories'
            )
        );
    }

    public function update(
        UpdateProductRequest $request,
        Product $product
    ) {
        $this->productService->update(
            $product,
            $request->validated()
        );

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $this->productService->delete($product);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product deleted successfully.');
    }

    public function destroyImage(ProductImage $image)
    {
        try {

            $this->productService->deleteImage($image);

            return back()->with(
                'success',
                'Image deleted successfully.'
            );
        } catch (ValidationException $e) {

            return back()->with(
                'error',
                $e->errors()['image'][0]
            );
        }
    }
}
