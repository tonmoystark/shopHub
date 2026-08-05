<?php

namespace App\Http\Controllers;

use App\Http\Requests\Checkout\StoreCheckoutRequest;
use App\Models\Order;
use App\Services\CartService;
use App\Services\CheckoutService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    public function __construct(
        protected CartService $cartService,
        protected CheckoutService $checkoutService,
    ) {}

    public function index()
    {
        if ($this->cartService->isEmpty()) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Your cart is empty.');
        }

        $cart = $this->cartService->summary();

        return view(
            'frontend.checkout.index',
            compact('cart')
        );
    }

    public function store(StoreCheckoutRequest $request): RedirectResponse
    {
        $order = $this->checkoutService->checkout(
            $request->validated()
        );

        return redirect()->route(
            'checkout.success',
            $order
        );
    }

    public function success(Order $order): View
    {
        return view(
            'frontend.checkout.success',
            compact('order')
        );
    }
}
