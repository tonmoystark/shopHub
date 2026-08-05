<?php

namespace App\Services;

use App\Enums\OrderStatus;
use DomainException;
use App\Models\Order;

class OrderService
{
    public function getFilteredOrders(array $filters)
    {
        return Order::query()
            ->withRelations()
            ->search($filters['search'] ?? null)
            ->orderStatus($filters['order_status'] ?? null)
            ->paymentStatus($filters['payment_status'] ?? null)
            ->latest()
            ->paginate(10)
            ->withQueryString();
    }

    public function getOrder(Order $order): Order
    {
        return Order::query()
            ->withRelations()
            ->findOrFail($order->id);
    }

    public function updateStatus(
        Order $order,
        string $status
    ): Order {

        $newStatus = OrderStatus::from($status);

        if (! $order->order_status->canTransitionTo($newStatus)) {
            throw new DomainException(
                'Invalid order status transition.'
            );
        }

        $order->update([
            'order_status' => $newStatus,
        ]);

        return $order;
    }

    public function updatePaymentStatus(
        Order $order,
        string $status
    ): Order {

        $order->update([
            'payment_status' => $status,
        ]);

        return $order;
    }
}
