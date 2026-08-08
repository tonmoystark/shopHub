<div
    x-show="mobileMenuOpen"
    x-transition
    @click.outside="mobileMenuOpen = false"
    class="border-t bg-white md:hidden"
>

    <nav class="space-y-2 p-4">

        <x-ui.nav-link
            :href="route('home')"
            :active="request()->routeIs('home')"
            class="block rounded-lg px-3 py-2"
        >
            Home
        </x-ui.nav-link>

        <x-ui.nav-link
            :href="route('products.index')"
            :active="request()->routeIs('products.*')"
            class="block rounded-lg px-3 py-2"
        >
            Products
        </x-ui.nav-link>

        <x-ui.nav-link
            :href="route('cart.index')"
            :active="request()->routeIs('cart.*')"
            class="block rounded-lg px-3 py-2"
        >
            Cart
        </x-ui.nav-link>

        <hr class="my-3">

        @auth

            <x-ui.nav-link
                :href="route('account.dashboard')"
                class="block rounded-lg px-3 py-2"
            >
                Dashboard
            </x-ui.nav-link>

            <x-ui.nav-link
                :href="route('account.orders.index')"
                class="block rounded-lg px-3 py-2"
            >
                My Orders
            </x-ui.nav-link>

            <x-ui.nav-link
                :href="route('account.profile')"
                class="block rounded-lg px-3 py-2"
            >
                Profile
            </x-ui.nav-link>

            <x-ui.nav-link
                :href="route('account.password')"
                class="block rounded-lg px-3 py-2"
            >
                Change Password
            </x-ui.nav-link>

            @if(auth()->user()->is_admin)

                <x-ui.nav-link
                    :href="route('admin.dashboard')"
                    class="block rounded-lg px-3 py-2"
                >
                    Admin Dashboard
                </x-ui.nav-link>

            @endif

            <form
                action="{{ route('logout') }}"
                method="POST"
            >

                @csrf

                <button
                    class="w-full rounded-lg px-3 py-2 text-left text-red-600 hover:bg-red-50"
                >
                    Logout
                </button>

            </form>

        @else

            <x-ui.nav-link
                :href="route('login')"
                class="block rounded-lg px-3 py-2"
            >
                Login
            </x-ui.nav-link>

            <x-ui.nav-link
                :href="route('register')"
                class="block rounded-lg px-3 py-2"
            >
                Register
            </x-ui.nav-link>

        @endauth

    </nav>

</div>