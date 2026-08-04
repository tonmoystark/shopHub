@props([
    'product',
])

@if($product->isInStock())

    @if($product->isLowStock())

        <x-ui.badge variant="warning">

            Low Stock

        </x-ui.badge>

    @else

        <x-ui.badge variant="success">

            In Stock

        </x-ui.badge>

    @endif

@else

    <x-ui.badge variant="danger">

        Out of Stock

    </x-ui.badge>

@endif