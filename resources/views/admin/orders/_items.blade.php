<x-admin.card>

    <h2 class="mb-6 text-lg font-semibold">
        Order Items
    </h2>

    <x-admin.table>

        <thead class="bg-gray-50">

            <tr>

                <th class="px-6 py-3 text-left text-xs font-semibold uppercase">
                    Product
                </th>

                <th class="px-6 py-3 text-left text-xs font-semibold uppercase">
                    Price
                </th>

                <th class="px-6 py-3 text-left text-xs font-semibold uppercase">
                    Qty
                </th>

                <th class="px-6 py-3 text-left text-xs font-semibold uppercase">
                    Subtotal
                </th>

            </tr>

        </thead>

        <tbody class="divide-y divide-gray-200 bg-white">

            @foreach($order->orderItems as $item)

                <tr>

                    <td class="px-6 py-4">

                        <p class="font-semibold">
                            {{ $item->product_name }}
                        </p>

                        <p class="text-sm text-gray-500">
                            SKU: {{ $item->product_sku }}
                        </p>

                    </td>

                    <td class="px-6 py-4">
                        ৳{{ number_format($item->product_price,2) }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $item->quantity }}
                    </td>

                    <td class="px-6 py-4 font-semibold">
                        ৳{{ number_format($item->subtotal,2) }}
                    </td>

                </tr>

            @endforeach

        </tbody>

    </x-admin.table>

</x-admin.card>