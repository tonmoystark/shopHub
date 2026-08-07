<div class="overflow-x-auto">

    <table class="min-w-full">

        <thead>

            <tr class="border-b bg-gray-50">

                <th class="px-4 py-3 text-left">

                    Order Number

                </th>

                <th class="px-4 py-3 text-left">

                    Date

                </th>

                <th class="px-4 py-3 text-left">

                    Total

                </th>

                <th class="px-4 py-3 text-left">

                    Payment

                </th>

                <th class="px-4 py-3 text-left">

                    Status

                </th>

                <th class="px-4 py-3 text-right">

                    Action

                </th>

            </tr>

        </thead>

        <tbody>

            @foreach($orders as $order)

                <tr class="border-b hover:bg-gray-50">

                    <td class="px-4 py-4 font-medium">

                        {{ $order->order_number }}

                    </td>

                    <td class="px-4 py-4">

                        {{ $order->created_at->format('d M Y') }}

                    </td>

                    <td class="px-4 py-4">

                        ৳{{ number_format($order->total, 2) }}

                    </td>

                    <td class="px-4 py-4">

    <x-ui.badge
        :variant="$order->payment_status->badgeVariant()"
    >
        {{ $order->payment_status->label() }}
    </x-ui.badge>

</td>

<td class="px-4 py-4">

    <x-ui.badge
        :variant="$order->order_status->badgeVariant()"
    >
        {{ $order->order_status->label() }}
    </x-ui.badge>

</td>

                    <td class="px-4 py-4 text-right">

                        <x-ui.button
                            variant="secondary"
                            :href="route('account.orders.show', $order)"
                        >
                            View
                        </x-ui.button>

                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>

</div>