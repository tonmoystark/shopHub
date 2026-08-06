<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class AccountService
{
    public function getDashboardStats(): array
    {
        $orders = Order::query()
            ->where('user_id', Auth::id());

        return [

            'totalOrders' => (clone $orders)->count(),

            'pendingOrders' => (clone $orders)
                ->where('order_status', 'pending')
                ->count(),

            'completedOrders' => (clone $orders)
                ->where('order_status', 'delivered')
                ->count(),

            'totalSpent' => (clone $orders)
                ->sum('total'),

            'recentOrders' => Order::query()
                ->withRelations()
                ->where('user_id', Auth::id())
                ->latest()
                ->take(5)
                ->get(),

        ];
    }

    public function getOrders()
    {
        return Order::query()
            ->withRelations()
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(10);
    }

    public function getOrder($orderId): Order
    {
        return Order::query()
            ->withRelations()
            ->where('user_id', Auth::id())
            ->findOrFail($orderId);
    }
}
