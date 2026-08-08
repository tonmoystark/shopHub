<nav class="sticky top-0 z-30 border-b bg-white">

    <div class="flex h-16 items-center justify-between px-4 sm:px-6">

        {{-- Left --}}
        <div class="flex items-center gap-4">

            {{-- Mobile Menu --}}
            <button
                type="button"
                class="rounded-lg p-2 text-gray-600 transition hover:bg-gray-100 lg:hidden"
                @click="sidebarOpen = !sidebarOpen"
            >

                <i
                    x-show="!sidebarOpen"
                    data-lucide="menu"
                    class="h-6 w-6"
                ></i>

                <i
                    x-show="sidebarOpen"
                    data-lucide="x"
                    class="h-6 w-6"
                ></i>

            </button>


            <div>

                <h1 class="text-lg font-semibold text-gray-900">
                    Admin Panel
                </h1>

                <p class="hidden text-xs text-gray-500 sm:block">
                    Manage your ShopHub store
                </p>

            </div>

        </div>


        {{-- Right --}}
        <div class="flex items-center gap-4">

            {{-- View Store --}}
            <a
                href="{{ route('home') }}"
                target="_blank"
                class="hidden items-center gap-2 rounded-lg px-3 py-2 text-sm font-medium text-gray-600 transition hover:bg-gray-100 hover:text-blue-600 sm:flex"
            >

                <i
                    data-lucide="external-link"
                    class="h-4 w-4"
                ></i>

                View Store

            </a>


            {{-- User --}}
            <div class="flex items-center gap-3 border-l pl-4">

                <div class="hidden text-right sm:block">

                    <p class="text-sm font-semibold text-gray-900">
                        {{ Auth::user()->name }}
                    </p>

                    <p class="text-xs text-gray-500">
                        Administrator
                    </p>

                </div>


                {{-- Avatar --}}
                <img
                    src="{{ Auth::user()->avatar_url }}"
                    alt="{{ Auth::user()->name }}"
                    class="h-10 w-10 rounded-full border object-cover"
                >

            </div>

        </div>

    </div>

</nav>