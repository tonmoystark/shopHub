@props([
    'category',
])

<a
    href="{{ route('products.index', [
        'category_id' => $category->id,
    ]) }}"
    {{ $attributes->merge([
        'class' => 'group block'
    ]) }}
>

    <x-ui.card
        class="p-8 transition-all duration-300 group-hover:-translate-y-1 group-hover:shadow-xl"
    >

        <div class="flex justify-center">

            @if($category->image)

                <img
                    src="{{ asset('storage/' . $category->image) }}"
                    alt="{{ $category->name }}"
                    class="h-20 w-20 rounded-full object-cover"
                >

            @else

                <div class="flex h-20 w-20 items-center justify-center rounded-full bg-blue-100">

                    <i
                        data-lucide="package"
                        class="h-10 w-10 text-blue-600"
                    ></i>

                </div>

            @endif

        </div>

        <h3 class="mt-6 text-center text-xl font-semibold text-gray-900">

            {{ $category->name }}

        </h3>

        @if(isset($footer))

            <div class="mt-2 text-center text-sm text-gray-500">

                {{ $footer }}

            </div>

        @else

            <p class="mt-2 text-center text-sm text-gray-500">

                {{ $category->products_count }} Products

            </p>

        @endif

    </x-ui.card>

</a>