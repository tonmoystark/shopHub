<x-ui.section>

    <x-ui.section-header
        title="Featured Products"
        description="Hand-picked products recommended just for you."
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

        @forelse($featuredProducts as $product)

            <x-ui.product-card
                :product="$product"
            />

        @empty

            <div class="col-span-full">

                <x-ui.empty-state
    icon="package-search"
    title="No Featured Products"
    description="Featured products will appear here soon."
/>

            </div>

        @endforelse

    </div>

</x-ui.section>