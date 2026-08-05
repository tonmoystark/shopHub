@props([
    'label' => null,
    'id' => null,
    'name',
    'value' => 1,
    'checked' => false,
])

@php
    $checkboxId = $id ?? $name;
@endphp

<div>

    <label
        for="{{ $checkboxId }}"
        class="flex items-center gap-3"
    >

        <input
            id="{{ $checkboxId }}"
            type="checkbox"
            name="{{ $name }}"
            value="{{ $value }}"
            @checked(old($name, $checked))
            {{ $attributes->merge([
                'class' => 'h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500'
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