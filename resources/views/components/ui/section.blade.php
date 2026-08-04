@props([
    'title' => '',
    'description' => '',
])

<section {{ $attributes }}>

    @if($title)

        <div class="mb-8">

            <h2 class="text-3xl font-bold text-gray-900">

                {{ $title }}

            </h2>

            @if($description)

                <p class="mt-2 text-gray-500">

                    {{ $description }}

                </p>

            @endif

        </div>

    @endif

    {{ $slot }}

</section>