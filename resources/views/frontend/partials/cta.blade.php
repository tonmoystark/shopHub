<x-ui.section
    class="rounded-3xl bg-gradient-to-r from-blue-600 to-indigo-700"
>

    <div class="mx-auto max-w-3xl text-center">

        <h2 class="text-4xl font-bold text-white">

            Ready to Start Shopping?

        </h2>

        <p class="mt-6 text-lg text-blue-100">

            Browse hundreds of premium products carefully selected for quality,
            affordability, and fast delivery.

        </p>

        <div class="mt-10 flex flex-col justify-center gap-4 sm:flex-row">

            <x-ui.button
                :href="route('products.index')"
            >
                Shop Now
            </x-ui.button>

            <x-ui.button
    variant="secondary"
    :href="route('products.index')"
>
    Browse Products
</x-ui.button>

        </div>

    </div>

</x-ui.section>