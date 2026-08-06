@extends('layouts.frontend')

@section('content')

@php

    $totalOrders = $stats['totalOrders'];
    $pendingOrders = $stats['pendingOrders'];
    $completedOrders = $stats['completedOrders'];
    $totalSpent = $stats['totalSpent'];
    $recentOrders = $stats['recentOrders'];

@endphp

<x-account.page
    title="My Account"
    :description="'Welcome back, ' . auth()->user()->name . '!'"
>

    @include('frontend.account.partials._stats')

    @include('frontend.account.partials._quick-actions')

    @include('frontend.account.partials._recent-orders')

</x-account.page>

@endsection