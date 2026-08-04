<?php

namespace App\Services;

use App\Models\Order;

class OrderNumberService
{
    public function generate(): string
    {
        $date = now()->format('Ymd');

        $lastOrder = Order::whereDate('created_at', today())
            ->latest('id')
            ->first();

        $sequence = 1;

        if ($lastOrder) {

            $lastSequence = (int) substr($lastOrder->order_number, -6);

            $sequence = $lastSequence + 1;
        }

        return sprintf(
            '%s-%s-%06d',
            config('order.prefix'),
            $date,
            $sequence
        );;
    }
}
