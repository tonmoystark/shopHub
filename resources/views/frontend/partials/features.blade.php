<x-ui.section>

    <x-ui.section-header
        title="Why Shop With Us"
        description="We provide a seamless shopping experience with quality products, secure payments, and fast delivery."
        class="text-center"
    />

    <div class="mt-16 grid gap-8 md:grid-cols-2 lg:grid-cols-4">

        <x-ui.feature-card
            title="Fast Delivery"
        >

            <x-slot:icon>

                <i
                    data-lucide="truck"
                    class="h-8 w-8"
                ></i>

            </x-slot:icon>

            Quick and reliable delivery to your doorstep across the country.

        </x-ui.feature-card>

        <x-ui.feature-card
            title="Secure Payment"
            color="green"
        >

            <x-slot:icon>

                <i
                    data-lucide="shield-check"
                    class="h-8 w-8"
                ></i>

            </x-slot:icon>

            Shop confidently with safe and encrypted payment methods.

        </x-ui.feature-card>

        <x-ui.feature-card
            title="Easy Returns"
            color="yellow"
        >

            <x-slot:icon>

                <i
                    data-lucide="refresh-ccw"
                    class="h-8 w-8"
                ></i>

            </x-slot:icon>

            Hassle-free returns and exchanges within our return policy.

        </x-ui.feature-card>

        <x-ui.feature-card
            title="Premium Quality"
            color="purple"
        >

            <x-slot:icon>

                <i
                    data-lucide="star"
                    class="h-8 w-8"
                ></i>

            </x-slot:icon>

            Carefully selected products to ensure the best quality for every customer.

        </x-ui.feature-card>

    </div>

</x-ui.section>