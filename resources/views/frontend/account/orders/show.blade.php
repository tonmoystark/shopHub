@extends('layouts.frontend')

@section('content')

<x-account.page
    title="Order Details"
    :description="'Order #' . $order->order_number"
>

    <x-ui.flash />

    <div class="grid gap-6 lg:grid-cols-3">

        <div class="space-y-6 lg:col-span-2">

            @include('frontend.account.orders.partials._order-information')

            @include('frontend.account.orders.partials._customer-information')

            @include('frontend.account.orders.partials._order-items')

        </div>

        <div class="space-y-6">

            @include('frontend.account.orders.partials._order-summary')

        </div>

    </div>

</x-account.page>

@endsection