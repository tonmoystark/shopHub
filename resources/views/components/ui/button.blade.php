@props([
    'variant' => 'primary',
    'type' => 'button',
])

@php

$classes = match ($variant) {

    'secondary' => 'bg-white text-gray-700 border border-gray-300 hover:bg-gray-100',

    'danger' => 'bg-red-600 text-white hover:bg-red-700',

    default => 'bg-blue-600 text-white hover:bg-blue-700',

};

@endphp

<button
    type="{{ $type }}"
    {{ $attributes->merge([
        'class' => "inline-flex items-center justify-center rounded-lg px-5 py-2.5 text-sm font-semibold transition {$classes}"
    ]) }}
>
    {{ $slot }}
</button>