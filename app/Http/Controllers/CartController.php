<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cart\StoreCartRequest;
use App\Http\Requests\Cart\UpdateCartRequest;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct(
        private CartService $cartService
    ) {}
    public function index()
    {
        $items = $this->cartService->items();

        return view('cart.index', [
            'items' => $items,
            'subtotal' => $this->cartService->subtotal(),
            'total' => $this->cartService->total(),
        ]);
    }

    public function store(StoreCartRequest $request, Product $product)
    {
        $this->cartService->add(
            $product,
            $request->quantity
        );

        return back()->with(
            'success',
            'Product added to cart.'
        );
    }
    public function update(UpdateCartRequest $request, Product $product)
    {
        $this->cartService->update(
            $product->id,
            $request->quantity
        );

        return back()->with(
            'success',
            'Cart updated successfully.'
        );
    }
    public function destroy(Product $product)
    {
        $this->cartService->remove($product->id);

        return back()->with(
            'success',
            'Product removed from cart.'
        );
    }
    public function clear()
    {
        $this->cartService->clear();

        return back()->with(
            'success',
            'Cart cleared successfully.'
        );
    }
}
