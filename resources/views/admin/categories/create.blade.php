@extends('admin.layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-6">
    Add Category
</h1>

<form action="{{ route('categories.store') }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    <div class="mb-5">

        <label class="block mb-2 font-medium">
            Category Name
        </label>

        <input
            type="text"
            name="name"
            class="w-full border rounded px-4 py-2"
            value="{{ old('name') }}"
        >
        @error('name')
    <p class="text-red-500 text-sm mt-1">
        {{ $message }}
    </p>
@enderror

    </div>

    <div class="mb-5">

        <label class="block mb-2 font-medium">
            Image
        </label>

        <input
            type="file"
            name="image"
        >
@error('image')
    <p class="text-red-500 text-sm mt-1">
        {{ $message }}
    </p>
@enderror
    </div>

    <div class="mb-5">

        <label>

            <input
                type="checkbox"
                name="status"
                value="1"
                checked
            >

            Active

        </label>

    </div>

    <button
        class="bg-green-600 text-white px-5 py-2 rounded">
        Save Category
    </button>

</form>

@endsection