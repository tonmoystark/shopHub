<x-ui.card class="p-6">

    <h2 class="mb-6 text-xl font-semibold">
        Order Information
    </h2>

    <div class="space-y-4">

        <div class="flex justify-between">

            <span class="text-gray-600">
                Order Number
            </span>

            <span class="font-medium">
                {{ $order->order_number }}
            </span>

        </div>

        <div class="flex justify-between">

            <span class="text-gray-600">
                Order Date
            </span>

            <span>
                {{ $order->created_at->format('d M Y, h:i A') }}
            </span>

        </div>

        <div class="flex justify-between">

            <span class="text-gray-600">
                Payment Method
            </span>

            <span>
                {{ $order->payment_method->label() }}
            </span>

        </div>

        <div class="flex justify-between items-center">

            <span class="text-gray-600">
                Payment Status
            </span>

            <x-ui.badge
                :variant="$order->payment_status->badgeVariant()"
            >
                {{ $order->payment_status->label() }}
            </x-ui.badge>

        </div>

        <div class="flex justify-between items-center">

            <span class="text-gray-600">
                Order Status
            </span>

            <x-ui.badge
                :variant="$order->order_status->badgeVariant()"
            >
                {{ $order->order_status->label() }}
            </x-ui.badge>

        </div>

    </div>

</x-ui.card>