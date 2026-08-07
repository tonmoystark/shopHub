<x-ui.card class="p-6">

    <h2 class="mb-6 text-xl font-semibold">
        Ordered Items
    </h2>

    <div class="overflow-x-auto">

        <table class="min-w-full">

            <thead>

                <tr class="border-b bg-gray-50">

                    <th class="px-4 py-3 text-left">
                        Product
                    </th>

                    <th class="px-4 py-3 text-center">
                        Qty
                    </th>

                    <th class="px-4 py-3 text-right">
                        Price
                    </th>

                    <th class="px-4 py-3 text-right">
                        Subtotal
                    </th>

                </tr>

            </thead>

            <tbody>

                @foreach($order->orderItems as $item)

                    <tr class="border-b">

                        <td class="px-4 py-4">

                            <p class="font-medium">

                                {{ $item->product_name }}

                            </p>

                            <p class="text-sm text-gray-500">

                                SKU: {{ $item->product_sku }}

                            </p>

                        </td>

                        <td class="px-4 py-4 text-center">

                            {{ $item->quantity }}

                        </td>

                        <td class="px-4 py-4 text-right">

                            ৳{{ number_format($item->product_price, 2) }}

                        </td>

                        <td class="px-4 py-4 text-right font-semibold">

                            ৳{{ number_format($item->subtotal, 2) }}

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</x-ui.card>