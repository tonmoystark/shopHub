<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    /*
    |--------------------------------------------------------------------------
    | Mass Assignment
    |--------------------------------------------------------------------------
    */

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'sku',
        'description',
        'price',
        'sale_price',
        'stock',
        'status',
        'is_featured',
    ];

    /*
    |--------------------------------------------------------------------------
    | Attribute Casting
    |--------------------------------------------------------------------------
    */

    protected $casts = [
        'status' => 'boolean',
        'is_featured' => 'boolean',
        'price' => 'decimal:2',
        'sale_price' => 'decimal:2',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Business Logic
    |--------------------------------------------------------------------------
    */

    public function currentPrice(): float
    {
        return $this->sale_price ?? $this->price;
    }

    public function primaryImage(): ?ProductImage
    {
        return $this->images->first();
    }

    public function isInStock(): bool
    {
        return $this->stock > 0;
    }

    public function isLowStock(): bool
    {
        return $this->stock > 0 && $this->stock <= 5;
    }

    public function isOnSale(): bool
    {
        return ! is_null($this->sale_price);
    }

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    */

    public function getPrimaryImageUrlAttribute(): string
    {
        return $this->primaryImage()
            ? asset('storage/' . $this->primaryImage()->image)
            : asset('images/placeholder-product.png');
    }

    protected function originalPrice(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->price,
        );
    }

    protected function currentPriceValue(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->currentPrice(),
        );
    }

    protected function discountPercentage(): Attribute
    {
        return Attribute::make(
            get: function () {

                if (
                    ! $this->sale_price ||
                    $this->price <= 0
                ) {
                    return null;
                }

                return round(
                    (($this->price - $this->sale_price) / $this->price) * 100
                );
            },
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Query Scopes
    |--------------------------------------------------------------------------
    */

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function scopeInStock($query)
    {
        return $query->where('stock', '>', 0);
    }

    public function scopeWithFrontendData($query)
    {
        return $query->with([
            'category',
            'images',
        ]);
    }

    public function scopeSearch($query, ?string $search)
    {
        if (! $search) {
            return $query;
        }

        return $query->where(function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
                ->orWhere('sku', 'like', "%{$search}%");
        });
    }

    public function scopeCategory($query, $categoryId)
    {
        if (! $categoryId) {
            return $query;
        }

        return $query->where('category_id', $categoryId);
    }

    public function scopeStatus($query, $status)
    {
        if ($status === null || $status === '') {
            return $query;
        }

        return $query->where('status', $status);
    }

    public function scopeFeatured($query, $featured)
    {
        if ($featured === null || $featured === '') {
            return $query;
        }

        return $query->where('is_featured', $featured);
    }

    public function scopeStock($query, ?string $stock)
    {
        if (! $stock) {
            return $query;
        }

        return match ($stock) {
            'low' => $query->whereBetween('stock', [1, 5]),
            'out' => $query->where('stock', 0),
            'available' => $query->where('stock', '>', 5),
            default => $query,
        };
    }
}
