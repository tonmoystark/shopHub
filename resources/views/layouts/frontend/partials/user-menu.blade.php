<div class="relative hidden md:block group">

    <button
        type="button"
        class="flex items-center gap-3 rounded-xl px-3 py-2 transition hover:bg-gray-100"
    >

        {{-- Avatar --}}
        <img
            src="{{ auth()->user()->avatar_url }}"
            alt="{{ auth()->user()->name }}"
            class="h-10 w-10 rounded-full object-cover border"
        >

        <div class="text-left">

            <p class="text-sm font-semibold text-gray-900">

                {{ auth()->user()->name }}

            </p>

            <p class="text-xs text-gray-500">

                My Account

            </p>

        </div>

        <i
            data-lucide="chevron-down"
            class="h-4 w-4 text-gray-500"
        ></i>

    </button>

    {{-- Dropdown --}}
    <div
        class="absolute right-0 mt-2 hidden w-64 overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-xl group-hover:block"
    >

        <div class="border-b p-4">

            <p class="font-semibold">

                {{ auth()->user()->name }}

            </p>

            <p class="text-sm text-gray-500">

                {{ auth()->user()->email }}

            </p>

        </div>

        <div class="py-2">

            <x-ui.nav-link
                :href="route('account.dashboard')"
                class="flex px-4 py-3 hover:bg-gray-50"
            >
                Dashboard
            </x-ui.nav-link>

            <x-ui.nav-link
                :href="route('account.orders.index')"
                class="flex px-4 py-3 hover:bg-gray-50"
            >
                My Orders
            </x-ui.nav-link>

            <x-ui.nav-link
                :href="route('account.profile')"
                class="flex px-4 py-3 hover:bg-gray-50"
            >
                Profile
            </x-ui.nav-link>

            <x-ui.nav-link
                :href="route('account.password')"
                class="flex px-4 py-3 hover:bg-gray-50"
            >
                Change Password
            </x-ui.nav-link>

        </div>

        @if(auth()->user()->is_admin)

            <div class="border-t py-2">

                <x-ui.nav-link
                    :href="route('admin.dashboard')"
                    class="flex px-4 py-3 hover:bg-gray-50"
                >
                    Admin Dashboard
                </x-ui.nav-link>

            </div>

        @endif

        <div class="border-t p-2">

            <form
                action="{{ route('logout') }}"
                method="POST"
            >

                @csrf

                <button
                    type="submit"
                    class="flex w-full rounded-lg px-4 py-3 text-left text-red-600 transition hover:bg-red-50"
                >
                    Logout
                </button>

            </form>

        </div>

    </div>

</div>