@props([
    'title',
    'description' => null,
])

<section class="py-10">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="mb-10">

            <h1 class="text-3xl font-bold text-gray-900">
                {{ $title }}
            </h1>

            @if($description)

                <p class="mt-2 text-gray-600">
                    {{ $description }}
                </p>

            @endif

        </div>

        <div class="grid gap-8 lg:grid-cols-4">

            <div>

                <x-account.sidebar />

            </div>

            <div class="lg:col-span-3">

                {{ $slot }}

            </div>

        </div>

    </div>

</section>