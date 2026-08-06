<x-ui.card class="p-6">

    <div class="mb-6 flex items-center justify-between">

        <h2 class="text-xl font-semibold">
            Recent Orders
        </h2>

        <x-ui.button
            :href="route('account.orders.index')"
            variant="secondary"
        >
            View All
        </x-ui.button>

    </div>

    @if($recentOrders->isEmpty())

        <div class="py-10 text-center text-gray-500">

            You haven't placed any orders yet.

        </div>

    @else

        <div class="overflow-x-auto">

            <table class="min-w-full">

                <thead>

                    <tr class="border-b">

                        <th class="py-3 text-left">
                            Order
                        </th>

                        <th class="py-3 text-left">
                            Date
                        </th>

                        <th class="py-3 text-left">
                            Total
                        </th>

                        <th class="py-3 text-left">
                            Status
                        </th>

                        <th class="py-3 text-right">
                            Action
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($recentOrders as $order)

                        <tr class="border-b">

                            <td class="py-4">
                                {{ $order->order_number }}
                            </td>

                            <td class="py-4">
                                {{ $order->created_at->format('d M Y') }}
                            </td>

                            <td class="py-4">
                                ৳{{ number_format($order->total, 2) }}
                            </td>

                            <td class="py-4">
                                {{ $order->order_status->label() }}
                            </td>

                            <td class="py-4 text-right">

                                <x-ui.button
                                    :href="route('account.orders.show', $order)"
                                    variant="secondary"
                                >
                                    View
                                </x-ui.button>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    @endif

</x-ui.card>