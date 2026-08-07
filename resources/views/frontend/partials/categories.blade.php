<x-ui.section>

    <x-ui.section-header
        title="Shop by Category"
        description="Explore products from your favorite categories."
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

    <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">

        @forelse($categories as $category)

            <x-ui.category-card
                :category="$category"
            >

                <x-slot:footer>

                    {{ $category->products_count }} Products

                </x-slot:footer>

            </x-ui.category-card>

        @empty

            <div class="col-span-full">

                <x-ui.empty-state
    icon="package"
    title="No Categories Found"
    description="Categories will appear here soon."
/>

            </div>

        @endforelse

    </div>

</x-ui.section>