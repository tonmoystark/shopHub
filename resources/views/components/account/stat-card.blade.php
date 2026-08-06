@props([
    'title',
    'value',
    'color' => 'text-gray-900',
])

<x-ui.card class="p-6">

    <p class="text-sm text-gray-500">
        {{ $title }}
    </p>

    <h2 class="mt-3 text-3xl font-bold {{ $color }}">
        {{ $value }}
    </h2>

</x-ui.card>