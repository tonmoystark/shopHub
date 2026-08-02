@props([
    'title' => null,
])

<div {{ $attributes->merge([
    'class' => 'rounded-xl border border-gray-200 bg-white shadow-sm'
]) }}>

    @if($title)
        <div class="border-b border-gray-200 px-6 py-4">
            <h2 class="text-lg font-semibold text-gray-800">
                {{ $title }}
            </h2>
        </div>
    @endif

    <div class="p-6">
        {{ $slot }}
    </div>

</div>