<nav class="hidden items-center gap-8 md:flex">

    <x-ui.nav-link
        :href="route('home')"
        :active="request()->routeIs('home')"
    >
        Home
    </x-ui.nav-link>

    <x-ui.nav-link
        :href="route('products.index')"
        :active="request()->routeIs('products.*')"
    >
        Products
    </x-ui.nav-link>

    <x-ui.nav-link
        href="#categories"
        :active="false"
    >
        Categories
    </x-ui.nav-link>

</nav>