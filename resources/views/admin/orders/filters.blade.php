<form
    method="GET"
    class="flex flex-col gap-3 lg:flex-row"
>

    <x-admin.search
        name="search"
        :value="$search"
        placeholder="Search orders..."
    />

    <x-admin.select
        name="order_status"
    >

        <option value="">
            All Order Status
        </option>

        @foreach(\App\Enums\OrderStatus::options() as $status)

            <option
                value="{{ $status['value'] }}"
                @selected($orderStatus == $status['value'])
            >
                {{ $status['label'] }}
            </option>

        @endforeach

    </x-admin.select>

    <x-admin.select
        name="payment_status"
    >

        <option value="">
            All Payment Status
        </option>

        @foreach(\App\Enums\PaymentStatus::options() as $status)

            <option
                value="{{ $status['value'] }}"
                @selected($paymentStatus == $status['value'])
            >
                {{ $status['label'] }}
            </option>

        @endforeach

    </x-admin.select>

</form>