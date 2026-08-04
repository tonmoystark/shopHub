@props([
    'title',
    'description' => null,
])

<div class="mb-10 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">

    <div>

        <h1 class="text-4xl font-bold text-gray-900">

            {{ $title }}

        </h1>

        @if($description)

            <p class="mt-2 text-gray-500">

                {{ $description }}

            </p>

        @endif

    </div>

    @isset($actions)

        <div>

            {{ $actions }}

        </div>

    @endisset

</div>