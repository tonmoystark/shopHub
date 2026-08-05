@props([
    'name',
    'rows' => 4,
    'value' => null,
])

<textarea
    name="{{ $name }}"
    rows="{{ $rows }}"
    {{ $attributes->merge([
        'class' => 'mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500',
    ]) }}
>{{ old($name, $value ?? ($slot->isEmpty() ? '' : trim($slot))) }}</textarea>