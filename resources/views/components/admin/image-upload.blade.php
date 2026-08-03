@props([
    'name',
    'label' => 'Image',
    'preview' => null,
    'multiple' => false,
    'help' => null,
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

    @if(!$multiple)

        <img
            src="{{ $preview ?? 'https://placehold.co/150x150?text=Preview' }}"
            data-image-preview
            class="mb-4 h-32 w-32 rounded-xl border border-gray-300 object-cover"
        >

    @else

        <div
            data-image-preview-list
            class="mb-4 flex flex-wrap gap-4"
        ></div>

    @endif

    <label
        for="{{ $name }}"
        data-drop-zone
        class="flex cursor-pointer flex-col items-center justify-center rounded-xl border-2 border-dashed border-gray-300 bg-gray-50 px-6 py-10 text-center transition hover:border-blue-500 hover:bg-blue-50"
    >

        <svg
            xmlns="http://www.w3.org/2000/svg"
            class="mb-3 h-12 w-12 text-gray-400"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="1.5"
                d="M3 15a4 4 0 014-4h1m4-4l4 4m0 0l4-4m-4 4V3"
            />
        </svg>

        <p class="font-medium text-gray-700">
            Drag & Drop your {{ $multiple ? 'images' : 'image' }} here
        </p>

        <p class="mt-1 text-sm text-gray-500">
            or click to browse
        </p>

        @if($help)
            <p class="mt-3 text-xs text-gray-400">
                {{ $help }}
            </p>
        @endif

    </label>

    <input
        id="{{ $name }}"
        type="file"
        name="{{ $multiple ? $name.'[]' : $name }}"
        class="hidden"
        data-image-input

        @if($multiple)
            multiple
        @endif
    >

    @error($name)
        <p class="mt-2 text-sm text-red-600">
            {{ $message }}
        </p>
    @enderror

</div>