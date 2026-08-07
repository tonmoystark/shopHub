<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class HomeService
{
    private const CATEGORY_LIMIT = 8;

    private const PRODUCT_LIMIT = 8;

    public function index(): array
    {
        return [
            'categories' => $this->getCategories(),
            'featuredProducts' => $this->getFeaturedProducts(),
            'latestProducts' => $this->getLatestProducts(),
        ];
    }
    protected function frontendProducts(): Builder
    {
        return Product::query()
            ->select([
                'id',
                'category_id',
                'name',
                'slug',
                'price',
                'sale_price',
                'stock',
                'is_featured',
                'status',
            ])
            ->active()
            ->withFrontendData();
    }

    /*
    |--------------------------------------------------------------------------
    | Categories
    |--------------------------------------------------------------------------
    */

    protected function getCategories(): Collection
    {
        return Category::query()
            ->withCount([
                'products' => fn($query) => $query->active(),
            ])
            ->latest('created_at')
            ->take(self::CATEGORY_LIMIT)
            ->get();
    }

    /*
    |--------------------------------------------------------------------------
    | Products
    |--------------------------------------------------------------------------
    */

    protected function getFeaturedProducts(): Collection
    {
        return $this->frontendProducts()
            ->featured(true)
            ->latest('created_at')
            ->take(self::PRODUCT_LIMIT)
            ->get();
    }

    protected function getLatestProducts(): Collection
    {
        return $this->frontendProducts()
            ->latest('created_at')
            ->take(self::PRODUCT_LIMIT)
            ->get();
    }
}
