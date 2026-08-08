<?php

namespace App\Services;

use App\Services\SlugService;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class ProductService
{
    public function __construct(
        protected SlugService $slugService
    ) {}

    public function getFilteredProducts(array $filters)
    {
        return Product::query()
            ->active()
            ->withFrontendData()
            ->search($filters['search'] ?? null)
            ->category($filters['category_id'] ?? null)
            ->status($filters['status'] ?? null)
            ->featured($filters['featured'] ?? null)
            ->stock($filters['stock'] ?? null)
            ->latest()
            ->paginate(10)
            ->withQueryString();
    }
    public function store(array $data): Product
    {
        return DB::transaction(function () use ($data) {

            $images = $data['images'] ?? [];

            unset($data['images']);

            $data['slug'] = $this->slugService->generate(
                $data['name'],
                Product::class
            );

            $data['status'] = $data['status'] ?? false;

            $data['is_featured'] = $data['is_featured'] ?? false;

            $product = Product::create($data);

            foreach ($images as $index => $image) {

                $product->images()->create([
                    'image' => $image->store('products', 'public'),
                    'sort_order' => $index,
                ]);
            }

            return $product;
        });
    }

    public function update(Product $product, array $data): Product
    {
        return DB::transaction(function () use ($product, $data) {

            $images = $data['images'] ?? [];

            unset($data['images']);

            $data['slug'] = $this->slugService->generate(
                $data['name'],
                Product::class,
                $product->id
            );

            $data['status'] = $data['status'] ?? false;

            $data['is_featured'] = $data['is_featured'] ?? false;

            $product->update($data);

            foreach ($images as $index => $image) {

                $product->images()->create([
                    'image' => $image->store('products', 'public'),
                    'sort_order' => $index,
                ]);
            }

            return $product;
        });
    }

    public function delete(Product $product): void
    {
        foreach ($product->images as $image) {

            Storage::disk('public')->delete($image->image);
        }

        $product->delete();
    }

    public function deleteImage(ProductImage $image): void
    {
        if ($image->product->images()->count() <= 1) {

            throw ValidationException::withMessages([
                'image' => 'A product must have at least one image.',
            ]);
        }

        Storage::disk('public')->delete($image->image);

        $image->delete();
    }

    public function getProduct(Product $product): Product
    {
        return $product->load([
            'category',
            'images',
        ]);
    }
    public function getFrontendProducts()
    {
        return Product::query()
            ->active()
            ->withFrontendData()
            ->latest()
            ->paginate(12);
    }
    public function decreaseStock(Product $product, int $quantity): void
    {
        if ($quantity <= 0) {
            return;
        }

        if ($product->stock < $quantity) {
            throw ValidationException::withMessages([
                'stock' => "Only {$product->stock} item(s) are available for {$product->name}.",
            ]);
        }

        $product->decrement('stock', $quantity);
    }
}
