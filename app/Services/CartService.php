<?php

namespace App\Services;

use App\Models\Product;
use DomainException;

class CartService
{
    private const CART_KEY = 'cart';

    /*
    |--------------------------------------------------------------------------
    | Cart Storage
    |--------------------------------------------------------------------------
    */

    public function getCart(): array
    {
        return session()->get(self::CART_KEY, []);
    }

    public function saveCart(array $cart): void
    {
        session()->put(self::CART_KEY, $cart);
    }

    /*
    |--------------------------------------------------------------------------
    | Cart Actions
    |--------------------------------------------------------------------------
    */

    public function add(Product $product, int $quantity = 1): void
    {
        $this->validateStock($product, $quantity);

        $cart = $this->getCart();

        if (isset($cart[$product->id])) {

            $newQuantity = $cart[$product->id]['quantity'] + $quantity;

            $this->validateStock($product, $newQuantity);

            $cart[$product->id]['quantity'] = $newQuantity;

            $cart[$product->id]['line_total'] = $this->calculateLineTotal(
                $product,
                $newQuantity
            );
        } else {

            $cart[$product->id] = $this->createCartItem(
                $product,
                $quantity
            );
        }

        $this->saveCart($cart);
    }

    public function update(Product $product, int $quantity): void
    {
        $cart = $this->getCart();

        if (! isset($cart[$product->id])) {
            return;
        }

        if ($quantity <= 0) {
            $this->remove($product->id);
            return;
        }

        $this->validateStock($product, $quantity);

        $cart[$product->id]['quantity'] = $quantity;

        $cart[$product->id]['line_total'] = $this->calculateLineTotal(
            $product,
            $quantity
        );

        $this->saveCart($cart);
    }

    public function remove(int $productId): void
    {
        $cart = $this->getCart();

        if (! isset($cart[$productId])) {
            return;
        }

        unset($cart[$productId]);

        $this->saveCart($cart);
    }

    public function clear(): void
    {
        session()->forget(self::CART_KEY);
    }

    /*
    |--------------------------------------------------------------------------
    | Cart Data
    |--------------------------------------------------------------------------
    */

    public function items(): array
    {
        return $this->getCart();
    }

    public function count(): int
    {
        return array_sum(
            array_column($this->getCart(), 'quantity')
        );
    }

    public function subtotal(): float
    {
        return array_sum(
            array_column($this->getCart(), 'line_total')
        );
    }

    /**
     * Shipping cost.
     * Change this later when implementing shipping rules.
     */
    public function shipping(): float
    {
        return 0.00;
    }

    public function total(): float
    {
        return $this->subtotal() + $this->shipping();
    }

    public function isEmpty(): bool
    {
        return empty($this->getCart());
    }

    public function hasItems(): bool
    {
        return ! $this->isEmpty();
    }

    public function summary(): array
    {
        return [
            'items' => $this->items(),
            'subtotal' => $this->subtotal(),
            'shipping' => $this->shipping(),
            'total' => $this->total(),
            'count' => $this->count(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Validation
    |--------------------------------------------------------------------------
    */

    private function validateStock(Product $product, int $quantity): void
    {
        if (! $product->isInStock()) {
            throw new DomainException(
                'This product is currently out of stock.'
            );
        }

        if ($quantity > $product->stock) {
            throw new DomainException(
                "Only {$product->stock} item(s) are available."
            );
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    private function createCartItem(Product $product, int $quantity): array
    {
        return [
            'product_id' => $product->id,
            'name' => $product->name,
            'slug' => $product->slug,
            'sku' => $product->sku,
            'unit_price' => $product->currentPrice(),
            'quantity' => $quantity,
            'stock' => $product->stock,
            'line_total' => $this->calculateLineTotal(
                $product,
                $quantity
            ),
            'image' => optional($product->primaryImage())->image,
        ];
    }

    private function calculateLineTotal(Product $product, int $quantity): float
    {
        return $product->currentPrice() * $quantity;
    }
}
