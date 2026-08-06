<div class="mb-10">

    <h2 class="mb-6 text-xl font-semibold">
        Quick Actions
    </h2>

    <div class="grid gap-4 md:grid-cols-3">

        <x-ui.card class="p-6">

            <h3 class="text-lg font-semibold">
                My Orders
            </h3>

            <p class="mt-2 text-sm text-gray-600">
                View all your previous orders.
            </p>

            <x-ui.button
                class="mt-6"
                :href="route('account.orders.index')"
            >
                View Orders
            </x-ui.button>

        </x-ui.card>

        <x-ui.card class="p-6">

            <h3 class="text-lg font-semibold">
                Edit Profile
            </h3>

            <p class="mt-2 text-sm text-gray-600">
                Update your account information.
            </p>

            <x-ui.button
                class="mt-6"
                :href="route('account.profile')"
            >
                Edit Profile
            </x-ui.button>

        </x-ui.card>

        <x-ui.card class="p-6">

            <h3 class="text-lg font-semibold">
                Change Password
            </h3>

            <p class="mt-2 text-sm text-gray-600">
                Keep your account secure.
            </p>

            <x-ui.button
                class="mt-6"
                :href="route('account.password')"
            >
                Change Password
            </x-ui.button>

        </x-ui.card>

    </div>

</div>