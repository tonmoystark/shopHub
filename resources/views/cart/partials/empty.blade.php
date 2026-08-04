<x-ui.card class="p-12 text-center">

    <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-gray-100">

        🛒

    </div>

    <h2 class="mt-6 text-2xl font-semibold text-gray-900">

        Your cart is empty

    </h2>

    <p class="mt-2 text-gray-500">

        Looks like you haven't added any products yet.

    </p>

    <a
        href="{{ route('home') }}"
        class="mt-8 inline-block"
    >

        <x-ui.button>

            Continue Shopping

        </x-ui.button>

    </a>

</x-ui.card>