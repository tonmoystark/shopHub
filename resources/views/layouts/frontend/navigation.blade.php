<nav class="border-b bg-white">

    <div class="container mx-auto flex items-center justify-between px-6 py-4">

        <a
            href="{{ route('home') }}"
            class="text-2xl font-bold"
        >
            ShopHub
        </a>

        <div class="flex items-center gap-6">

            <a href="{{ route('home') }}">
                Home
            </a>

            <a href="{{ route('cart.index') }}">
                Cart
                @if($cartCount > 0)
                    ({{ $cartCount }})
                @endif
            </a>

        </div>

    </div>

</nav>