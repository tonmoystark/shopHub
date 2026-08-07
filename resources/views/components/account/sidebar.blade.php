<x-ui.card class="sticky top-6 p-6">

    <div class="mb-6 flex items-center gap-4">

        @if(auth()->user()->avatar)

    <img
        src="{{ auth()->user()->avatar_url }}"
        class="h-12 w-12 rounded-full object-cover"
        alt="{{ auth()->user()->name }}"
    >

@else

    <div class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-600 text-white font-bold">
        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
    </div>

@endif

        <div>

            <h2 class="font-semibold text-gray-900">
                {{ auth()->user()->name }}
            </h2>

            <p class="text-sm text-gray-500">
                {{ auth()->user()->email }}
            </p>

        </div>

    </div>

      <hr class="mb-6">

    <form
        method="POST"
        action="{{ route('logout') }}"
    >
        @csrf

        <x-ui.button
            type="submit"
            variant="danger"
            class="flex w-full items-center justify-center gap-2"
        >
            {{-- <x-lucide-log-out class="h-5 w-5" /> --}}

            Logout
        </x-ui.button>

    </form>

</x-ui.card>