@props([
    'title',
    'description' => null,
])

<div class="mx-auto max-w-7xl">

    <x-admin.page-header
        :title="$title"
        :description="$description"
    >

        {{ $actions ?? '' }}

    </x-admin.page-header>

    {{ $slot }}

</div>