<x-ui.card class="sticky top-6 p-6">

    <h2 class="mb-6 text-xl font-semibold">

        Order Summary

    </h2>

    <div class="space-y-4">

        <div class="flex items-center justify-between">

            <span class="text-gray-600">

                Subtotal

            </span>

            <span class="font-semibold">

                ৳{{ number_format($subtotal, 2) }}

            </span>

        </div>

        <div class="flex items-center justify-between">

            <span class="text-gray-600">

                Shipping

            </span>

            <span>

                Calculated at checkout

            </span>

        </div>

        <hr>

        <div class="flex items-center justify-between text-lg font-bold">

            <span>

                Total

            </span>

            <span>

                ৳{{ number_format($total, 2) }}

            </span>

        </div>

    </div>

    <x-ui.button class="mt-8 w-full">

        Proceed To Checkout

    </x-ui.button>

</x-ui.card>