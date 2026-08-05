<x-admin.card>

    <h2 class="mb-6 text-lg font-semibold">
        Order Actions
    </h2>

    <div class="space-y-8">

        {{-- Update Order Status --}}
        <form
            action="{{ route('admin.orders.update-status', $order) }}"
            method="POST"
        >

            @csrf
            @method('PATCH')

            <x-ui.label for="order_status">
                Order Status
            </x-ui.label>

            <x-admin.select
                id="order_status"
                name="order_status"
                class="mt-2"
            >

                @foreach(\App\Enums\OrderStatus::options() as $status)

                    <option
                        value="{{ $status['value'] }}"
                        @selected($order->order_status->value === $status['value'])
                    >
                        {{ $status['label'] }}
                    </option>

                @endforeach

            </x-admin.select>

            <x-admin.button
                type="submit"
                class="mt-4 w-full"
            >
                Update Order Status
            </x-admin.button>

        </form>

        <hr>

        {{-- Update Payment Status --}}
        <form
            action="{{ route('admin.orders.update-payment-status', $order) }}"
            method="POST"
        >

            @csrf
            @method('PATCH')

            <x-ui.label for="payment_status">
                Payment Status
            </x-ui.label>

            <x-admin.select
                id="payment_status"
                name="payment_status"
                class="mt-2"
            >

                @foreach($order->order_status->nextStatuses() as $status)

    <option
        value="{{ $status->value }}"
        @selected($order->order_status === $status)
    >
        {{ $status->label() }}
    </option>

@endforeach

            </x-admin.select>

            <x-admin.button
                type="submit"
                class="mt-4 w-full"
            >
                Update Payment Status
            </x-admin.button>

        </form>

        <hr>

        <x-admin.button
            href="{{ route('admin.orders.index') }}"
            variant="secondary"
            class="w-full"
        >
            Back to Orders
        </x-admin.button>

    </div>

</x-admin.card>