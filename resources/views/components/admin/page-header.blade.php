@props([
    'title',
    'description' => null,
])

<div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

    <div>

        <h1 class="text-3xl font-bold text-gray-800">
            {{ $title }}
        </h1>

        @if($description)
            <p class="mt-1 text-sm text-gray-500">
                {{ $description }}
            </p>
        @endif

    </div>

    <div>
        {{ $slot }}
    </div>

</div>