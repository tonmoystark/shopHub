@props([
    'label' => '',
    'name',
    'type' => 'text',
])

<div class="mb-5">

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
        value="{{ old($name) }}"
        {{ $attributes->merge([
            'class' => 'w-full rounded-lg border border-gray-300 px-4 py-2 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 outline-none transition'
        ]) }}
    >

    @error($name)
        <p class="mt-1 text-sm text-red-600">
            {{ $message }}
        </p>
    @enderror

</div>