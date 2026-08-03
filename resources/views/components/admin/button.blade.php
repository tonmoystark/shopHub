
@props([
    'type' => 'button',
    'variant' => 'primary',
    'href' => null,
])

@php
    $classes = match($variant) {
        'primary' => 'bg-blue-600 hover:bg-blue-700 text-white',
        'success' => 'bg-green-600 hover:bg-green-700 text-white',
        'danger' => 'bg-red-600 hover:bg-red-700 text-white',
        'secondary' => 'bg-gray-200 hover:bg-gray-300 text-gray-800',
        'outline' => 'border border-gray-300 hover:bg-gray-100 text-gray-800',
        default => 'bg-blue-600 hover:bg-blue-700 text-white',
    };

    $baseClasses = "inline-flex items-center w-42 justify-center rounded-xl px-4 py-2.5 text-sm font-medium transition-all duration-200 shadow-sm $classes";
@endphp

@if($href)

<a
    href="{{ $href }}"
    {{ $attributes->merge([
        'class' => $baseClasses
    ]) }}
>
    {{ $slot }}
</a>

@else

<button
    type="{{ $type }}"
    {{ $attributes->merge([
        'class' => $baseClasses
    ]) }}
>
    {{ $slot }}
</button>

@endif