@extends('layouts.frontend')

@section('content')

<x-account.page
    title="My Orders"
    description="View and track all of your orders."
>

    <x-ui.flash />

    <x-ui.card class="p-6">

        @if($orders->isEmpty())

            @include('frontend.account.orders.partials._empty')

        @else

            @include('frontend.account.orders.partials._table')

            <div class="mt-6">

                {{ $orders->links() }}

            </div>

        @endif

    </x-ui.card>

</x-account.page>

@endsection