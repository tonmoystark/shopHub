@props([
    'placeholder' => 'Search...',
])

<form method="GET" data-search-form>

    <input
        type="search"
        name="search"
        value="{{ request('search') }}"
        placeholder="{{ $placeholder }}"
        autocomplete="off"
        data-search-input

        class="w-full sm:w-72 rounded-xl border border-gray-300 bg-white px-4 py-2.5 text-sm shadow-sm outline-none transition-all duration-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-500"
    >

</form>