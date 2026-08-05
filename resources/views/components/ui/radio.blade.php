@props([
    'label' => null,
    'id' => null,
    'name',
    'value',
    'checked' => false,
])

@php
    $radioId = $id ?? $name . '-' . str_replace('_', '-', $value);
@endphp

<div>

    <label
        for="{{ $radioId }}"
        class="flex items-center gap-3"
    >

        <input
            id="{{ $radioId }}"
            type="radio"
            name="{{ $name }}"
            value="{{ $value }}"
            @checked(old($name, $checked ? $value : null) == $value)
            {{ $attributes->merge([
                'class' => 'h-4 w-4 border-gray-300 text-blue-600 focus:ring-blue-500'
            ]) }}
        >

        @if($label)

            <span class="text-sm font-medium text-gray-700">
                {{ $label }}
            </span>

        @endif

    </label>

    @error($name)

        <p class="mt-2 text-sm text-red-600">
            {{ $message }}
        </p>

    @enderror

</div>