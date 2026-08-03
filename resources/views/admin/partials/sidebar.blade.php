{{-- Overlay --}}
<div
    x-show="sidebarOpen"
    x-transition.opacity
    class="fixed inset-0 z-40 bg-black/50 lg:hidden"
    @click="sidebarOpen = false"
></div>

{{-- Sidebar --}}
<aside
    class="fixed inset-y-0 left-0 z-50 w-64 bg-slate-900 text-white transform transition-transform duration-300 lg:static lg:translate-x-0"

    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
>

    <div class="p-6">

        <h2 class="mb-8 text-2xl font-bold">
            ShopHub
        </h2>

        <ul class="space-y-3">

            <li>Dashboard</li>

            <li>Products</li>

            <li>Categories</li>

            <li>Brands</li>

            <li>Orders</li>

            <li>Customers</li>

        </ul>

    </div>

</aside>