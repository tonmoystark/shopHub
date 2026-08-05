@extends('layouts.frontend')

@section('content')

<x-ui.section>

    <x-ui.page-header
        title="Checkout"
        description="Complete your order by providing your shipping information."
    />

    <form
        action="{{ route('checkout.store') }}"
        method="POST"
        class="grid gap-8 lg:grid-cols-3"
    >

        @csrf

        {{-- Customer Information --}}
        <div class="space-y-6 lg:col-span-2">

            <x-ui.card class="p-6">

                <h2 class="mb-6 text-xl font-semibold">
                    Customer Information
                </h2>

                <div class="grid gap-6 md:grid-cols-2">

                    <div>
                        <x-ui.label for="customer_name">
                            Full Name
                        </x-ui.label>

                        <x-ui.input
                            id="customer_name"
                            name="customer_name"
                            :value="old('customer_name')"
                            required
                        />

                        @error('customer_name')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <x-ui.label for="customer_email">
                            Email
                        </x-ui.label>

                        <x-ui.input
                            id="customer_email"
                            type="email"
                            name="customer_email"
                            :value="old('customer_email')"
                            required
                        />

                        @error('customer_email')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <x-ui.label for="customer_phone">
                            Phone
                        </x-ui.label>

                        <x-ui.input
                            id="customer_phone"
                            name="customer_phone"
                            :value="old('customer_phone')"
                            required
                        />

                        @error('customer_phone')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <x-ui.label for="city">
                            City
                        </x-ui.label>

                        <x-ui.input
                            id="city"
                            name="city"
                            :value="old('city')"
                            required
                        />

                        @error('city')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                </div>

                <div class="mt-6">

                    <x-ui.label for="shipping_address">
                        Shipping Address
                    </x-ui.label>

                    <x-ui.textarea
    id="shipping_address"
    name="shipping_address"
    rows="4"
    required
/>

                    @error('shipping_address')
                        <p class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <div class="mt-6">

                    <x-ui.label for="notes">
                        Order Notes (Optional)
                    </x-ui.label>

                    <x-ui.textarea
    id="notes"
    name="notes"
    rows="3"
/>

                </div>

            </x-ui.card>

            <x-ui.card class="p-6">

                <h2 class="mb-4 text-xl font-semibold">
                    Payment Method
                </h2>

                <label class="flex items-center gap-3">

                    <input
                        type="radio"
                        name="payment_method"
                        value="cash_on_delivery"
                        checked
                    >

                    <span>
                        Cash on Delivery
                    </span>

                </label>

            </x-ui.card>

        </div>

        {{-- Order Summary --}}
        <div>

            <x-ui.card class="sticky top-6 p-6">

                <h2 class="mb-6 text-xl font-semibold">
                    Order Summary
                </h2>

                <div class="space-y-4">

                    @foreach($cart['items'] as $item)

                        <div class="flex items-center justify-between">

                            <div>

                                <p class="font-medium">
                                    {{ $item['name'] }}
                                </p>

                                <p class="text-sm text-gray-500">
                                    Qty: {{ $item['quantity'] }}
                                </p>

                            </div>

                            <span class="font-semibold">
                                ৳{{ number_format($item['line_total'], 2) }}
                            </span>

                        </div>

                    @endforeach

                </div>

                <div class="my-6 border-t"></div>

                <div class="space-y-3">

                    <div class="flex justify-between">
                        <span>Subtotal</span>

                        <span>
                            ৳{{ number_format($cart['subtotal'], 2) }}
                        </span>
                    </div>

                    <div class="flex justify-between">
                        <span>Shipping</span>

                        <span>
                            ৳{{ number_format($cart['shipping'], 2) }}
                        </span>
                    </div>

                    <div class="flex justify-between text-lg font-bold">

                        <span>Total</span>

                        <span>
                            ৳{{ number_format($cart['total'], 2) }}
                        </span>

                    </div>

                </div>

                <x-ui.button
                    type="submit"
                    class="mt-8 w-full"
                >
                    Place Order
                </x-ui.button>

            </x-ui.card>

        </div>

    </form>

</x-ui.section>

@endsection