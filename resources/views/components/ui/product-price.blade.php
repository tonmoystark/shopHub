@props([
    'product',
])

<div {{ $attributes->merge([
    'class' => 'flex items-center gap-3'
]) }}>

    @if($product->isOnSale())

    <span class="text-xl font-bold text-blue-600">
        ৳{{ number_format($product->current_price_value, 2) }}
    </span>

    <span class="text-sm text-gray-400 line-through">
        ৳{{ number_format($product->original_price, 2) }}
    </span>

@endif

</div>