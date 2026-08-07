@props([
    'title',
    'description' => null,
    'icon' => '📦',
])

<x-ui.card
    {{ $attributes->merge([
        'class' => 'p-12 text-center'
    ]) }}
>

    <div
        class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-gray-100 text-4xl"
    >

        {{ $icon }}

    </div>

    <h2 class="mt-6 text-2xl font-semibold text-gray-900">

        {{ $title }}

    </h2>

    @if($description)

        <p class="mt-2 text-gray-500">

            {{ $description }}

        </p>

    @endif

    {{ $slot }}

</x-ui.card>