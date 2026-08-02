@props([
    'name',
    'label',
    'checked' => false,
])

<div class="flex items-center gap-3">

    <input
        id="{{ $name }}"
        type="checkbox"
        name="{{ $name }}"
        value="1"
        @checked(old($name, $checked))

        {{ $attributes->merge([
            'class' => 'h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-2 focus:ring-blue-500'
        ]) }}
    >

    <label
        for="{{ $name }}"
        class="text-sm font-medium text-gray-700 cursor-pointer"
    >
        {{ $label }}
    </label>

</div>

@error($name)
    <p class="mt-2 text-sm text-red-600">
        {{ $message }}
    </p>
@enderror