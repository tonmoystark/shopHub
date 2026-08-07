<a
    href="{{ route('cart.index') }}"
    class="relative"
>

    <i
        data-lucide="shopping-cart"
        class="h-6 w-6"
    ></i>
    
    <span
        class="absolute -right-2 -top-2 flex h-5 w-5 items-center justify-center rounded-full bg-blue-600 text-xs font-semibold text-white"
    >
        {{ session('cart') ? count(session('cart')) : 0 }}
    </span>

</a>