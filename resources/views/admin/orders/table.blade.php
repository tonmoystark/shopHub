<x-admin.table>

    <thead class="bg-gray-50">

        <tr>

            <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-600">
                Order #
            </th>

            <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-600">
                Customer
            </th>

            <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-600">
                Total
            </th>

            <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-600">
                Payment
            </th>

            <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-600">
                Status
            </th>

            <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-600">
                Date
            </th>

            <th class="px-6 py-3 text-center text-xs font-semibold uppercase text-gray-600">
                Actions
            </th>

        </tr>

    </thead>

    <tbody class="divide-y divide-gray-200 bg-white">

        @forelse($orders as $order)

            <tr class="transition hover:bg-gray-50">

                <td class="px-6 py-4 font-semibold">
                    {{ $order->order_number }}
                </td>

                <td class="px-6 py-4">

                    {{ $order->customer_name }}

                    @if($order->user)

                        <p class="text-sm text-gray-500">
                            {{ $order->customer_email }}
                        </p>

                    @else

                        <p class="text-sm text-gray-500">
                            Guest Order
                        </p>

                    @endif

                </td>

                <td class="px-6 py-4 font-semibold">
                    ৳{{ number_format($order->total, 2) }}
                </td>

                <td class="px-6 py-4">
    {{ $order->payment_status->label() }}
</td>

<td class="px-6 py-4">
    {{ $order->order_status->label() }}
</td>

                <td class="px-6 py-4 text-gray-600">
                    {{ $order->created_at->format('d M Y') }}
                </td>

                <td class="px-6 py-4">

                    <div class="flex justify-center">

                        <x-admin.button
                            href="{{ route('admin.orders.show', $order) }}"
                            variant="secondary"
                        >
                            View
                        </x-admin.button>

                    </div>

                </td>

            </tr>

        @empty

            <tr>

                <td
                    colspan="7"
                    class="p-8"
                >

                    <x-admin.empty-state
                        title="No Orders Found"
                        description="Customer orders will appear here."
                    />

                </td>

            </tr>

        @endforelse

    </tbody>

</x-admin.table>

<div class="mt-6">

    {{ $orders->links() }}

</div>