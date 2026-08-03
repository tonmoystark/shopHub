<nav class="flex items-center justify-between bg-white p-4 shadow">

    <div class="flex items-center gap-4">

        {{-- Hamburger --}}
        <button
            class="rounded-lg p-2 hover:bg-gray-100 lg:hidden"
            @click="sidebarOpen = !sidebarOpen"
        >

            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16"
                />

            </svg>

        </button>

        <h1 class="font-bold">
            Admin Panel
        </h1>

    </div>

    <p>
        {{ Auth::user()->name }}
    </p>

</nav>