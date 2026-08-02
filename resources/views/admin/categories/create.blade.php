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
        <x-admin.input 
            label="Category Name"
            name="name"
            type="text"
            value="{{ old('name') }}"
            placeholder="Enter Category Name"
        />
        @error('name')
    <p class="text-red-500 text-sm mt-1">
        {{ $message }}
    </p>
@enderror

    </div>

    <div class="mb-5">
        <x-admin.input 
            label="Image"
            name="image"
            type="file"
        />
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

    <x-admin.button
        type="submit" variant="success">
        Save Category
    </x-admin.button>

</form>

@endsection