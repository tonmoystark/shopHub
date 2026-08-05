@extends('admin.layouts.app')

@section('content')

<x-admin.page
    :title="'Order #' . $order->order_number"
    description="View and manage customer order."
>

    <div class="grid gap-6 lg:grid-cols-3">

        <div class="space-y-6 lg:col-span-2">

            @include('admin.orders._customer')

            @include('admin.orders._items')

        </div>

        <div class="space-y-6">

            @include('admin.orders._summary')

            @include('admin.orders._actions')

        </div>

    </div>

</x-admin.page>

@endsection