@extends('admin.layouts.app')

@section('content')

<x-admin.page
    title="Orders"
    description="Manage customer orders."
>

    <x-slot:actions>

        @include('admin.orders.filters')

    </x-slot:actions>

    <x-admin.card>

        @include('admin.orders.table')

    </x-admin.card>

</x-admin.page>

@endsection