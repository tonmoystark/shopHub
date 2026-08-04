<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

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

    protected $casts = [
        'status' => 'boolean',
        'is_featured' => 'boolean',
        'price' => 'decimal:2',
        'sale_price' => 'decimal:2',
    ];

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
    public function getPrimaryImageUrlAttribute(): string
    {
        return $this->primaryImage()
            ? asset('storage/' . $this->primaryImage()->image)
            : asset('images/placeholder-product.png');
    }
    public function isOnSale(): bool
    {
        return ! is_null($this->sale_price);
    }
}
