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
        $search = $request->search;
        $category = $request->category_id;
        $status = $request->status;
        $featured = $request->featured;
        $stock = $request->stock;

        $products = Product::with([
            'category',
            'images',
        ])

            ->when($search, function ($query) use ($search) {

                $query->where(function ($q) use ($search) {

                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('sku', 'like', "%{$search}%");
                });
            })

            ->when($category, function ($query) use ($category) {

                $query->where('category_id', $category);
            })

            ->when($status !== null && $status !== '', function ($query) use ($status) {

                $query->where('status', $status);
            })

            ->when($featured !== null && $featured !== '', function ($query) use ($featured) {

                $query->where('is_featured', $featured);
            })

            ->when($stock, function ($query) use ($stock) {

                if ($stock == 'low') {

                    $query->whereBetween('stock', [1, 5]);
                }

                if ($stock == 'out') {

                    $query->where('stock', 0);
                }

                if ($stock == 'available') {

                    $query->where('stock', '>', 5);
                }
            })

            ->latest()

            ->paginate(10)

            ->withQueryString();

        $categories = $this->categoryService->getForSelect();

        return view(
            'admin.products.index',
            compact(
                'products',
                'categories',
                'search',
                'category',
                'status',
                'featured',
                'stock'
            )
        );
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
