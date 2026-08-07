@props([
    'title',
    'description' => null,
])

<div
    {{ $attributes->merge([
        'class' => 'flex flex-col gap-4 md:flex-row md:items-end md:justify-between'
    ]) }}
>

    <div>

        <h2 class="text-3xl font-bold text-gray-900">

            {{ $title }}

        </h2>

        @if($description)

            <p class="mt-2 max-w-2xl text-gray-600">

                {{ $description }}

            </p>

        @endif

    </div>

    @isset($action)

        <div>

            {{ $action }}

        </div>

    @endisset

</div>