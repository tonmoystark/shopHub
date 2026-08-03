@props([
    'title' => 'No Data Found',
    'description' => 'There is nothing to display.',
])

<div class="flex flex-col items-center justify-center rounded-xl border-2 border-dashed border-gray-300 bg-gray-50 px-6 py-12 text-center">

    <div class="mb-4 flex h-16 w-16 items-center justify-center rounded-full bg-blue-100">

        <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-8 w-8 text-blue-600"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="2"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M3 7h18M6 11h12M8 15h8M10 19h4"
            />
        </svg>

    </div>

    <h2 class="text-lg font-semibold text-gray-800">
        {{ $title }}
    </h2>

    <p class="mt-2 max-w-md text-sm text-gray-500">
        {{ $description }}
    </p>

    @isset($action)
        <div class="mt-6">
            {{ $action }}
        </div>
    @endisset

</div>