@props([
    'name' => 'quantity',
    'value' => 1,
    'min' => 1,
    'max' => null,
])

<div class="quantity-selector">
    <div class="inline-flex items-center overflow-hidden rounded-lg border border-gray-300">

    <button
        type="button"
        class="quantity-decrease flex h-10 w-10 items-center justify-center bg-gray-100 text-lg font-semibold transition hover:bg-gray-200"
    >
        −
    </button>

    <input
        type="number"
        name="{{ $name }}"
        value="{{ old($name, $value) }}"
        min="{{ $min }}"
        @if($max) max="{{ $max }}" @endif

        class="quantity-input h-10 w-16 border-x border-gray-300 text-center focus:outline-none"
    >
    <button
    type="button"
    class="quantity-increase flex h-10 w-10 items-center justify-center bg-gray-100 text-lg font-semibold transition hover:bg-gray-200"
    >
    +
</button>

</div>

<p
    class="quantity-error mt-2 hidden text-sm text-red-600"
    role="alert"
></p>


@error($name)

<p class="mt-2 text-sm text-red-600">
    {{ $message }}
</p>

@enderror
</div>