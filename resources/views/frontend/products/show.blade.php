@extends('layouts.frontend')

@section('content')

<x-ui.section>

    <div class="grid gap-12 lg:grid-cols-2">

        {{-- Product Images --}}
        <div>

            <img
                src="{{ $product->primary_image_url }}"
                alt="{{ $product->name }}"
                class="w-full rounded-2xl object-cover shadow"
            >

            @if($product->images->count() > 1)

                <div class="mt-4 grid grid-cols-4 gap-3">

                    @foreach($product->images as $image)

                        <img
                            src="{{ asset('storage/' . $image->image) }}"
                            alt=""
                            class="rounded-xl border object-cover"
                        >

                    @endforeach

                </div>

            @endif

        </div>

        {{-- Product Info --}}
        <div>

            <p class="text-sm uppercase tracking-wide text-gray-500">

                {{ $product->category->name }}

            </p>

            <h1 class="mt-2 text-4xl font-bold">

                {{ $product->name }}

            </h1>

            <div class="mt-6">

                <x-ui.price
                    :product="$product"
                />

            </div>

            <div class="mt-4">

                <x-ui.stock-badge
                    :product="$product"
                />

            </div>

            <div class="mt-8 prose max-w-none">

                {!! nl2br(e($product->description)) !!}

            </div>

            <form
    action="{{ route('cart.store', $product) }}"
    method="POST"
    class="mt-8"
>

    @csrf

    <div class="space-y-8">

        <div>

            <h3 class="mb-3 text-sm font-semibold uppercase tracking-wide text-gray-600">
                Quantity
            </h3>

            <x-ui.quantity-selector
                name="quantity"
                :value="1"
                :max="$product->stock"
            />

        </div>

        <x-ui.order-summary
            :product="$product"
        />

    </div>

</form>

        </div>

    </div>

</x-ui.section>

@endsection