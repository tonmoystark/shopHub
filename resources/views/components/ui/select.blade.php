@props([
    'label' => null,
    'id' => null,
    'name',
])

@php
    $selectId = $id ?? $name;
@endphp

<div>

    @if($label)

        <x-ui.label
            :for="$selectId"
            :required="$attributes->has('required')"
        >
            {{ $label }}
        </x-ui.label>

    @endif

    <select
        id="{{ $selectId }}"
        name="{{ $name }}"
        {{ $attributes->merge([
            'class' => 'w-full rounded-xl border border-gray-300 px-4 py-3 transition focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500'
        ]) }}
    >

        {{ $slot }}

    </select>

    @error($name)

        <p class="mt-2 text-sm text-red-600">
            {{ $message }}
        </p>

    @enderror

</div>