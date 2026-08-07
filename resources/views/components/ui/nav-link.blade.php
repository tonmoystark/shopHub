@props([
    'href',
    'active' => false,
])

<a
    href="{{ $href }}"
    {{ $attributes->merge([
        'class' => collect([
            'relative text-sm transition-colors',

            $active
                ? 'font-semibold text-blue-600'
                : 'font-medium text-gray-700 hover:text-blue-600',
        ])->implode(' '),
    ]) }}
>

    {{ $slot }}

    @if($active)

        <span
            class="absolute -bottom-1 left-0 h-0.5 w-full rounded-full bg-blue-600"
        ></span>

    @endif

</a>