<x-ui.section>

    <x-ui.section-header
        title="Latest Products"
        description="Discover our newest arrivals and fresh collections."
    >

        <x-slot:action>

            <x-ui.button
                variant="secondary"
                :href="route('products.index')"
            >
                View All
            </x-ui.button>

        </x-slot:action>

    </x-ui.section-header>

    <div class="mt-12 grid gap-8 sm:grid-cols-2 lg:grid-cols-4">

        @forelse($latestProducts as $product)

            <x-ui.product-card
                :product="$product"
            />

        @empty

            <x-ui.empty-state
                icon="package-search"
                title="No Products Found"
                description="Latest products will appear here soon."
                class="col-span-full"
            />

        @endforelse

    </div>

</x-ui.section>