@props([
    'name',
    'label' => 'Image',
    'preview' => null,
    'placeholder' => 'https://placehold.co/150x150?text=Preview',
])

<div class="mb-5" data-image-upload>

    @if($label)
        <label
            for="{{ $name }}"
            class="mb-2 block text-sm font-medium text-gray-700"
        >
            {{ $label }}
        </label>
    @endif

    <img
        src="{{ $preview ?? $placeholder }}"
        alt="{{ $label }}"
        data-image-preview
        class="mb-4 h-32 w-32 rounded-xl border border-gray-300 object-cover"
    >

    <input
        id="{{ $name }}"
        type="file"
        name="{{ $name }}"
        data-image-input

        {{ $attributes->merge([
            'class' => 'block w-full rounded-xl border border-gray-300 bg-white px-3 py-2 text-sm text-gray-700
                        file:mr-4 file:rounded-lg file:border-0
                        file:bg-blue-600 file:px-4 file:py-2
                        file:text-white hover:file:bg-blue-700'
        ]) }}
    >

    @error($name)
        <p class="mt-2 text-sm text-red-600">
            {{ $message }}
        </p>
    @enderror

</div>