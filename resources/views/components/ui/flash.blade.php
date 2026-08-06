@if(session('success'))

    <div
        class="mb-6 rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-green-800"
    >

        <div class="flex items-center gap-2">

            <span class="text-lg">
                ✅
            </span>

            <span class="font-medium">
                {{ session('success') }}
            </span>

        </div>

    </div>

@endif


@if(session('error'))

    <div
        class="mb-6 rounded-xl border border-red-200 bg-red-50 px-5 py-4 text-red-800"
    >

        <div class="flex items-center gap-2">

            <span class="text-lg">
                ❌
            </span>

            <span class="font-medium">
                {{ session('error') }}
            </span>

        </div>

    </div>

@endif


@if(session('warning'))

    <div
        class="mb-6 rounded-xl border border-yellow-200 bg-yellow-50 px-5 py-4 text-yellow-800"
    >

        <div class="flex items-center gap-2">

            <span class="text-lg">
                ⚠️
            </span>

            <span class="font-medium">
                {{ session('warning') }}
            </span>

        </div>

    </div>

@endif


@if(session('info'))

    <div
        class="mb-6 rounded-xl border border-blue-200 bg-blue-50 px-5 py-4 text-blue-800"
    >

        <div class="flex items-center gap-2">

            <span class="text-lg">
                ℹ️
            </span>

            <span class="font-medium">
                {{ session('info') }}
            </span>

        </div>

    </div>

@endif