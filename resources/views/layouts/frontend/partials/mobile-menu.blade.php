<button
    @click="mobileMenuOpen = ! mobileMenuOpen"
    class="rounded-lg p-2 transition hover:bg-gray-100 md:hidden"
>

    <i
        x-show="!mobileMenuOpen"
        data-lucide="menu"
        class="h-6 w-6"
    ></i>

    <i
        x-show="mobileMenuOpen"
        data-lucide="x"
        class="h-6 w-6"
    ></i>

</button>