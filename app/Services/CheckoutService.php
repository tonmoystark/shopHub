<?php

namespace App\Services;

use App\Enums\OrderStatus;
use App\Enums\PaymentStatus;
use App\Models\Order;
use App\Models\Product;
use DomainException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutService
{
    public function __construct(
        protected CartService $cartService,
        protected OrderNumberService $orderNumberService,
        protected ProductService $productService,
    ) {}

    public function checkout(array $data): Order
    {
        if ($this->cartService->isEmpty()) {
            throw new DomainException('Your cart is empty.');
        }

        return DB::transaction(function () use ($data) {

            $cart = $this->cartService->summary();

            /*
            |--------------------------------------------------------------------------
            | Create Order
            |--------------------------------------------------------------------------
            */

            $order = Order::create([

                'user_id' => Auth::id(),

                'order_number' => $this->orderNumberService->generate(),

                'customer_name' => $data['customer_name'],

                'customer_email' => $data['customer_email'],

                'customer_phone' => $data['customer_phone'],

                'shipping_address' => $data['shipping_address'],

                'city' => $data['city'],

                'subtotal' => $cart['subtotal'],

                'discount' => 0,

                'shipping' => $cart['shipping'],

                'tax' => 0,

                'total' => $cart['total'],

                'payment_method' => $data['payment_method'],

                'payment_status' => PaymentStatus::Pending->value,

                'order_status' => OrderStatus::Pending->value,

                'notes' => $data['notes'] ?? null,
            ]);

            /*
            |--------------------------------------------------------------------------
            | Load Purchased Products
            |--------------------------------------------------------------------------
            */

            $productIds = collect($cart['items'])
                ->pluck('product_id');

            $products = Product::whereIn('id', $productIds)
                ->get()
                ->keyBy('id');

            /*
            |--------------------------------------------------------------------------
            | Create Order Items & Reduce Stock
            |--------------------------------------------------------------------------
            */

            foreach ($cart['items'] as $item) {

                $this->createOrderItem(
                    $order,
                    $item
                );

                $product = $products[$item['product_id']];

                $this->productService->decreaseStock(
                    $product,
                    $item['quantity']
                );
            }

            /*
            |--------------------------------------------------------------------------
            | Clear Cart
            |--------------------------------------------------------------------------
            */

            $this->cartService->clear();

            return $order;
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    private function createOrderItem(Order $order, array $item): void
    {
        $order->orderItems()->create([

            'product_id' => $item['product_id'],

            'product_name' => $item['name'],

            'product_sku' => $item['sku'],

            'product_price' => $item['unit_price'],

            'quantity' => $item['quantity'],

            'subtotal' => $item['line_total'],
        ]);
    }
}
