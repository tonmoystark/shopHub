<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\AccountService;

class AccountController extends Controller
{
    public function __construct(
        protected AccountService $accountService
    ) {}

    public function dashboard()
    {
        $stats = $this->accountService->getDashboardStats();

        return view(
            'frontend.account.dashboard',
            compact('stats')
        );
    }

    public function orders()
    {
        $orders = $this->accountService->getOrders();

        return view(
            'frontend.account.orders.index',
            compact('orders')
        );
    }

    public function showOrder($order)
    {
        $order = $this->accountService->getOrder($order);

        return view(
            'frontend.account.orders.show',
            compact('order')
        );
    }

    public function profile()
    {
        return view('frontend.account.profile');
    }

    public function password()
    {
        return view('frontend.account.password');
    }
}
