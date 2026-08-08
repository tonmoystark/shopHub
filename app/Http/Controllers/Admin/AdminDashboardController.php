<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'products' => Product::count(),

            'categories' => Category::count(),

            'orders' => Order::count(),

            'customers' => User::where('role', '!=', 'admin')->count(),

            'revenue' => Order::query()
                ->where('payment_status', 'paid')
                ->sum('total'),
        ];

        $recentOrders = Order::query()
            ->latest()
            ->take(5)
            ->get();

        $lowStockProducts = Product::query()
            ->where('stock', '>', 0)
            ->where('stock', '<=', 5)
            ->latest('stock')
            ->take(5)
            ->get();

        return view('admin.dashboard', [
            'stats' => $stats,
            'recentOrders' => $recentOrders,
            'lowStockProducts' => $lowStockProducts,
        ]);
    }
}
