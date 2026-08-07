<x-ui.section class="bg-gradient-to-r from-blue-600 to-indigo-700">

    <div class="grid items-center gap-10 lg:grid-cols-2">

        <div>

            <span class="rounded-full bg-white/20 px-4 py-2 text-sm font-semibold text-white">

                Welcome to ShopHub

            </span>

            <h1 class="mt-6 text-5xl font-bold leading-tight text-white">

                Everything You Need,
                <br>
                All In One Place.

            </h1>

            <p class="mt-6 text-lg text-blue-100">

                Discover premium products at affordable prices with fast delivery and secure checkout.

            </p>

            <div class="mt-10 flex gap-4">

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

        <div>

            <img
                src="https://placehold.co/700x500"
                alt="Hero"
                class="rounded-2xl shadow-2xl"
            >

        </div>

    </div>

</x-ui.section>