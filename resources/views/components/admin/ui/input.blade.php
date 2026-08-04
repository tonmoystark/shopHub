@props([
    'label' => null,
    'name',
    'type' => 'text',
    'value' => '',
])

<div>

    @if($label)

        <label
            for="{{ $name }}"
            class="mb-2 block text-sm font-medium text-gray-700"
        >
            {{ $label }}
        </label>

    @endif

    <input
        id="{{ $name }}"
        name="{{ $name }}"
        type="{{ $type }}"
        value="{{ old($name, $value) }}"
        {{ $attributes->merge([
            'class' => 'w-full rounded-xl border border-gray-300 px-4 py-3 transition focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500'
        ]) }}
    >

    @error($name)

        <p class="mt-2 text-sm text-red-600">
            {{ $message }}
        </p>

    @enderror

</div>