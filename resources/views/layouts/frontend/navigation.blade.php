<header
    x-data="{ mobileMenuOpen: false }"
    class="sticky top-0 z-50 border-b bg-white/90 backdrop-blur"
>
    <div class="mx-auto flex h-16 max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">

        @include('layouts.frontend.partials.logo')

        @include('layouts.frontend.partials.nav-links')

        <div class="flex items-center gap-4">

            @include('layouts.frontend.partials.cart-button')

            @auth
                @include('layouts.frontend.partials.user-menu')
            @else
                @include('layouts.frontend.partials.guest-menu')
            @endauth

            @include('layouts.frontend.partials.mobile-menu')

        </div>

    </div>

    @include('layouts.frontend.partials.mobile-navigation')

</header>