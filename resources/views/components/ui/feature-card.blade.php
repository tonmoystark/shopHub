@props([
    'title',
    'color' => 'blue',
])

@php

$colors = match ($color) {

    'green' => 'bg-green-100 text-green-600',

    'yellow' => 'bg-yellow-100 text-yellow-600',

    'purple' => 'bg-purple-100 text-purple-600',

    'red' => 'bg-red-100 text-red-600',

    default => 'bg-blue-100 text-blue-600',

};

@endphp

<x-ui.card
    {{ $attributes->merge([
        'class' => 'p-8 text-center'
    ]) }}
>

    <div
        class="mx-auto flex h-16 w-16 items-center justify-center rounded-full {{ $colors }}"
    >

        {{ $icon ?? '' }}

    </div>

    <h3 class="mt-6 text-xl font-semibold">

        {{ $title }}

    </h3>

    <p class="mt-3 text-gray-600">

        {{ $slot }}

    </p>

</x-ui.card>