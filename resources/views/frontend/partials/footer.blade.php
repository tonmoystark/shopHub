<footer class="mt-20 border-t bg-gray-950 text-gray-300">

    {{-- Main Footer --}}
    <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">

        <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-4">

            {{-- Brand --}}
            <div>

                <a
                    href="{{ route('home') }}"
                    class="text-2xl font-bold text-white"
                >
                    ShopHub
                </a>

                <p class="mt-4 max-w-sm text-sm leading-6 text-gray-400">
                    Your trusted destination for quality products,
                    great prices, and a simple shopping experience.
                </p>

                {{-- Social Icons --}}
                <div class="mt-6 flex items-center gap-3">

    {{-- Facebook --}}
    <a
        href="#"
        aria-label="Facebook"
        class="flex h-10 w-10 items-center justify-center rounded-full bg-gray-800 transition hover:bg-blue-600"
    >
        <svg
            class="h-5 w-5 fill-current"
            viewBox="0 0 24 24"
            aria-hidden="true"
        >
            <path
                d="M14 8h3V4h-3c-2.8 0-5 2.2-5 5v3H6v4h3v8h4v-8h3l1-4h-4V9c0-.6.4-1 1-1z"
            />
        </svg>
    </a>


    {{-- Instagram --}}
    <a
        href="#"
        aria-label="Instagram"
        class="flex h-10 w-10 items-center justify-center rounded-full bg-gray-800 transition hover:bg-pink-600"
    >
        <svg
            class="h-5 w-5 fill-none stroke-current"
            viewBox="0 0 24 24"
            stroke-width="2"
            aria-hidden="true"
        >
            <rect
                x="3"
                y="3"
                width="18"
                height="18"
                rx="5"
            />

            <circle
                cx="12"
                cy="12"
                r="4"
            />

            <circle
                cx="17.5"
                cy="6.5"
                r="1"
                class="fill-current stroke-none"
            />
        </svg>
    </a>


    {{-- Twitter / X --}}
    <a
        href="#"
        aria-label="Twitter"
        class="flex h-10 w-10 items-center justify-center rounded-full bg-gray-800 transition hover:bg-sky-500"
    >
        <svg
            class="h-5 w-5 fill-current"
            viewBox="0 0 24 24"
            aria-hidden="true"
        >
            <path
                d="M18.9 2H22l-6.8 7.8L23.2 22h-6.3l-4.9-6.2L6.6 22H3.5l7.3-8.4L3 2h6.4l4.4 5.8L18.9 2zm-1.1 17.8h1.7L8.5 4.1H6.7l11.1 15.7z"
            />
        </svg>
    </a>

</div>

            </div>


            {{-- Shop --}}
            <div>

                <h3 class="text-sm font-semibold uppercase tracking-wider text-white">
                    Shop
                </h3>

                <ul class="mt-5 space-y-3 text-sm">

                    <li>
                        <a
                            href="{{ route('products.index') }}"
                            class="transition hover:text-white"
                        >
                            All Products
                        </a>
                    </li>

                    <li>
                        <a
                            href="{{ route('products.index') }}"
                            class="transition hover:text-white"
                        >
                            Featured Products
                        </a>
                    </li>

                    <li>
                        <a
                            href="{{ route('cart.index') }}"
                            class="transition hover:text-white"
                        >
                            Shopping Cart
                        </a>
                    </li>

                    @auth

                        <li>
                            <a
                                href="{{ route('account.orders.index') }}"
                                class="transition hover:text-white"
                            >
                                My Orders
                            </a>
                        </li>

                    @endauth

                </ul>

            </div>


            {{-- Account --}}
            <div>

                <h3 class="text-sm font-semibold uppercase tracking-wider text-white">
                    Account
                </h3>

                <ul class="mt-5 space-y-3 text-sm">

                    @auth

                        <li>
                            <a
                                href="{{ route('account.dashboard') }}"
                                class="transition hover:text-white"
                            >
                                My Account
                            </a>
                        </li>

                        <li>
                            <a
                                href="{{ route('account.profile') }}"
                                class="transition hover:text-white"
                            >
                                Profile
                            </a>
                        </li>

                        <li>
                            <a
                                href="{{ route('account.orders.index') }}"
                                class="transition hover:text-white"
                            >
                                Order History
                            </a>
                        </li>

                        <li>

                            <form
                                action="{{ route('logout') }}"
                                method="POST"
                            >

                                @csrf

                                <button
                                    type="submit"
                                    class="transition hover:text-white"
                                >
                                    Logout
                                </button>

                            </form>

                        </li>

                    @else

                        <li>
                            <a
                                href="{{ route('login') }}"
                                class="transition hover:text-white"
                            >
                                Login
                            </a>
                        </li>

                        <li>
                            <a
                                href="{{ route('register') }}"
                                class="transition hover:text-white"
                            >
                                Create Account
                            </a>
                        </li>

                    @endauth

                </ul>

            </div>


            {{-- Contact --}}
            <div>

                <h3 class="text-sm font-semibold uppercase tracking-wider text-white">
                    Contact
                </h3>

                <ul class="mt-5 space-y-4 text-sm">

                    <li class="flex items-start gap-3">

                        <i
                            data-lucide="map-pin"
                            class="mt-0.5 h-5 w-5 shrink-0 text-gray-500"
                        ></i>

                        <span>
                            Bangladesh
                        </span>

                    </li>

                    <li class="flex items-center gap-3">

                        <i
                            data-lucide="mail"
                            class="h-5 w-5 shrink-0 text-gray-500"
                        ></i>

                        <a
                            href="mailto:tonmoy.a009@gmail.com"
                            class="transition hover:text-white"
                        >
                            tonmoy.a009@gmail.com
                        </a>

                    </li>

                    <li class="flex items-center gap-3">

                        <i
                            data-lucide="phone"
                            class="h-5 w-5 shrink-0 text-gray-500"
                        ></i>

                        <span>
                            +880 1700-962184
                        </span>

                    </li>

                </ul>

            </div>

        </div>

    </div>


    {{-- Bottom Bar --}}
    <div class="border-t border-gray-800">

        <div class="mx-auto flex max-w-7xl flex-col gap-3 px-4 py-6 text-sm sm:px-6 md:flex-row md:items-center md:justify-between lg:px-8">

            <p class="text-gray-500">
                © {{ date('Y') }} ShopHub. All rights reserved.
            </p>

            <div class="flex gap-6">

                <a
                    href="#"
                    class="text-gray-500 transition hover:text-white"
                >
                    Privacy Policy
                </a>

                <a
                    href="#"
                    class="text-gray-500 transition hover:text-white"
                >
                    Terms & Conditions
                </a>

            </div>

        </div>

    </div>

</footer>