<?php

namespace App\Services;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    public function updateProfile(array $data): User
    {
        /** @var User $user */
        $user = Auth::user();

        if (
            isset($data['avatar']) &&
            $data['avatar'] instanceof UploadedFile
        ) {

            $user->replaceAvatar($data['avatar']);

            unset($data['avatar']);
        }

        $user->update($data);

        return $user->fresh();
    }

    public function changePassword(array $data): void
    {
        $user = Auth::user();

        $user->update([
            'password' => Hash::make(
                $data['password']
            ),
        ]);
    }
    public function profile(): array
    {
        return [
            'user' => auth()->user(),
        ];
    }
}
