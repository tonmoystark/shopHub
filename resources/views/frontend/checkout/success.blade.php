@extends('layouts.frontend')

@section('content')

<x-ui.section>

    <div class="mx-auto max-w-2xl">

        <x-ui.card class="p-10 text-center">

            <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-green-100">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-10 w-10 text-green-600"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M5 13l4 4L19 7"
                    />
                </svg>

            </div>

            <h1 class="mt-6 text-3xl font-bold text-gray-900">
                Order Placed Successfully!
            </h1>

            <p class="mt-3 text-gray-600">
                Thank you for your purchase. Your order has been received and is being processed.
            </p>

            <div class="mt-8 rounded-xl bg-gray-50 p-6 text-left">

                <div class="flex justify-between py-2">
                    <span class="font-medium">Order Number</span>
                    <span>{{ $order->order_number }}</span>
                </div>

                <div class="flex justify-between py-2">
                    <span class="font-medium">Payment Method</span>
                    <span>{{ $order->payment_method->value }}</span>
                </div>

                <div class="flex justify-between py-2">
                    <span class="font-medium">Order Status</span>
                    <span>{{ $order->order_status->value }}</span>
                </div>

                <div class="flex justify-between py-2">
                    <span class="font-medium">Payment Status</span>
                    <span>{{ $order->payment_status->value }}</span>
                </div>

                <div class="mt-4 border-t pt-4 flex justify-between text-lg font-bold">
                    <span>Total</span>
                    <span>৳{{ number_format($order->total, 2) }}</span>
                </div>

            </div>

            <div class="mt-8 flex flex-col gap-4 sm:flex-row sm:justify-center">

                <x-ui.button
                    :href="route('home')"
                >
                    Continue Shopping
                </x-ui.button>

                <x-ui.button
                    variant="secondary"
                    :href="route('products.index')"
                >
                    Browse Products
                </x-ui.button>

            </div>

        </x-ui.card>

    </div>

</x-ui.section>

@endsection