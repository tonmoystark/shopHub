@props([
    'product',
])

@if($product->isOnSale())

    <div class="flex items-center gap-3">

        <span class="text-3xl font-bold text-blue-600">

            ৳{{ number_format($product->sale_price, 2) }}

        </span>

        <span class="text-lg text-gray-400 line-through">

            ৳{{ number_format($product->price, 2) }}

        </span>

    </div>

@else

    <span class="text-3xl font-bold text-blue-600">

        ৳{{ number_format($product->price, 2) }}

    </span>

@endif