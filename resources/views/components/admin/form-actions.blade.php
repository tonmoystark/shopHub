@props([
    'cancel' => null,
    'submitText' => 'Save',
    'cancelText' => 'Cancel',
])

<div class="mt-8 flex flex-col gap-3 sm:flex-row">

    <x-admin.button
        type="submit"
        variant="success"
    >
        {{ $submitText }}
    </x-admin.button>

    @if($cancel)

        <x-admin.button
            href="{{ $cancel }}"
            variant="secondary"
        >
            {{ $cancelText }}
        </x-admin.button>

    @endif

</div>