@if (session('success'))
    <div
        class="mb-5 rounded-lg border border-green-200 bg-green-100 px-4 py-3 text-green-800">

        {{ session('success') }}

    </div>
@endif


@if (session('error'))
    <div
        class="mb-5 rounded-lg border border-red-200 bg-red-100 px-4 py-3 text-red-800">

        {{ session('error') }}

    </div>
@endif


@if (session('warning'))
    <div
        class="mb-5 rounded-lg border border-yellow-200 bg-yellow-100 px-4 py-3 text-yellow-800">

        {{ session('warning') }}

    </div>
@endif