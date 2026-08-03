@extends('admin.layouts.app')

@section('content')

<x-admin.page
    title="Create Product"
    description="Add a new product to your store."
>

    <x-admin.card>

<form
    action="{{ route('admin.products.store') }}"
    method="POST"
    enctype="multipart/form-data"
>

    @csrf

    @include('admin.products._form', [
    'product' => new \App\Models\Product(),
])

    <x-admin.form-actions
        submitText="Save Product"
        :cancel="route('admin.products.index')"
    />

</form>

    </x-admin.card>

</x-admin.page>

@endsection