@props([
    'label' => null,
    'name',
    'required' => false,
])

<div class="mb-5">

    @if($label)
        <label
            for="{{ $name }}"
            class="mb-2 block text-sm font-medium text-gray-700"
        >
            {{ $label }}

            @if($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

    <select
        id="{{ $name }}"
        name="{{ $name }}"
        @required($required)

        {{ $attributes->class([
            'w-full rounded-xl border bg-white px-4 py-2.5 text-sm text-gray-700 shadow-sm transition-all duration-200 outline-none',

            'border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-500' => !$errors->has($name),

            'border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500' => $errors->has($name),
        ]) }}
    >

        {{ $slot }}

    </select>

    @error($name)
        <p class="mt-2 text-sm font-medium text-red-600">
            {{ $message }}
        </p>
    @enderror

</div>