@extends('layouts.app')

@section('content')

<div class="container mx-auto px-4 py-10">

    <x-ui.page-header
        title="Shopping Cart"
        description="Review your items before proceeding to checkout."
    >

        <x-slot:actions>

            <a href="{{ route('home') }}">

                <x-ui.button variant="secondary">

                    Continue Shopping

                </x-ui.button>

            </a>

        </x-slot:actions>

    </x-ui.page-header>

    @if(! empty($items))

        <div class="grid gap-8 lg:grid-cols-3">

            <div class="space-y-4 lg:col-span-2">

                @foreach($items as $item)

                    @include('cart.partials.cart-item', [
                        'item' => $item,
                    ])

                @endforeach

            </div>

            <div>

                @include('cart.partials.summary')

            </div>

        </div>

    @else

        @include('cart.partials.empty')

    @endif

</div>

@endsection