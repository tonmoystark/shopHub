<div class="py-10 text-center">

    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-gray-100">

        <i
            data-lucide="shopping-bag"
            class="h-8 w-8 text-gray-400"
        ></i>

    </div>

    <h3 class="mt-4 text-lg font-semibold text-gray-900">
        No Orders Yet
    </h3>

    <p class="mt-2 text-sm text-gray-500">
        You haven't placed any orders yet.
    </p>

    <x-ui.button
        :href="route('products.index')"
        class="mt-6"
    >
        Start Shopping
    </x-ui.button>

</div>