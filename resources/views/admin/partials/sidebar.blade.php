{{-- Mobile Overlay --}}
<div
    x-show="sidebarOpen"
    x-transition.opacity
    @click="sidebarOpen = false"
    class="fixed inset-0 z-40 bg-black/50 lg:hidden"
></div>


{{-- Sidebar --}}
<aside
    class="fixed inset-y-0 left-0 z-50 w-64 -translate-x-full border-r bg-white transition-transform duration-300 lg:static lg:translate-x-0"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
>

    {{-- Logo --}}
    <div class="flex h-16 items-center border-b px-6">

        <a
            href="{{ route('admin.dashboard') }}"
            class="text-2xl font-bold text-blue-600"
        >
            ShopHub
        </a>

    </div>


    {{-- Navigation --}}
    <nav class="p-4">

        <p class="mb-3 px-3 text-xs font-semibold uppercase tracking-wider text-gray-400">
            Main Menu
        </p>

        <div class="space-y-1">

            {{-- Dashboard --}}
            <a
                href="{{ route('admin.dashboard') }}"
                class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition
                {{ request()->routeIs('admin.dashboard')
                    ? 'bg-blue-50 text-blue-600'
                    : 'text-gray-700 hover:bg-gray-50 hover:text-blue-600' }}"
            >

                <i
                    data-lucide="layout-dashboard"
                    class="h-5 w-5"
                ></i>

                <span>Dashboard</span>

            </a>


            {{-- Products --}}
            <a
                href="{{ route('admin.products.index') }}"
                class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition
                {{ request()->routeIs('admin.products.*')
                    ? 'bg-blue-50 text-blue-600'
                    : 'text-gray-700 hover:bg-gray-50 hover:text-blue-600' }}"
            >

                <i
                    data-lucide="package"
                    class="h-5 w-5"
                ></i>

                <span>Products</span>

            </a>


            {{-- Categories --}}
            <a
                href="{{ route('admin.categories.index') }}"
                class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition
                {{ request()->routeIs('admin.categories.*')
                    ? 'bg-blue-50 text-blue-600'
                    : 'text-gray-700 hover:bg-gray-50 hover:text-blue-600' }}"
            >

                <i
                    data-lucide="tags"
                    class="h-5 w-5"
                ></i>

                <span>Categories</span>

            </a>


            {{-- Orders --}}
            <a
                href="{{ route('admin.orders.index') }}"
                class="flex items-center justify-between rounded-lg px-3 py-2.5 text-sm font-medium transition
                {{ request()->routeIs('admin.orders.*')
                    ? 'bg-blue-50 text-blue-600'
                    : 'text-gray-700 hover:bg-gray-50 hover:text-blue-600' }}"
            >

                <div class="flex items-center gap-3">

                    <i
                        data-lucide="shopping-bag"
                        class="h-5 w-5"
                    ></i>

                    <span>Orders</span>

                </div>

            </a>

        </div>


        {{-- Store --}}
        <div class="mt-8">

            <p class="mb-3 px-3 text-xs font-semibold uppercase tracking-wider text-gray-400">
                Store
            </p>

            <a
                href="{{ route('home') }}"
                target="_blank"
                class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium text-gray-700 transition hover:bg-gray-50 hover:text-blue-600"
            >

                <i
                    data-lucide="store"
                    class="h-5 w-5"
                ></i>

                <span>View Store</span>

            </a>

        </div>


        {{-- Account --}}
        <div class="mt-8">

            <p class="mb-3 px-3 text-xs font-semibold uppercase tracking-wider text-gray-400">
                Account
            </p>

            <form
                action="{{ route('logout') }}"
                method="POST"
            >

                @csrf

                <button
                    type="submit"
                    class="flex w-full items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium text-red-600 transition hover:bg-red-50"
                >

                    <i
                        data-lucide="log-out"
                        class="h-5 w-5"
                    ></i>

                    <span>Logout</span>

                </button>

            </form>

        </div>

    </nav>

</aside>