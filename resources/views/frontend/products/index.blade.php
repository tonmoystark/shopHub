@extends('layouts.frontend')

@section('content')

<x-ui.section>

    <x-ui.page-header
        title="Products"
        description="Browse our latest collection."
    />

    @if($products->count())

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

            @foreach($products as $product)

                <x-ui.product-card
                    :product="$product"
                />

            @endforeach

        </div>

        <div class="mt-10">

            {{ $products->links() }}

        </div>

    @else

        <x-ui.empty-state
            title="No Products Found"
            description="There are no products available at the moment."
        />

    @endif

</x-ui.section>

@endsection