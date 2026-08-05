<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;
use App\Http\Requests\Order\UpdateOrderStatusRequest;
use App\Http\Requests\Order\UpdatePaymentStatusRequest;
use DomainException;

class OrderController extends Controller
{
    public function __construct(
        protected OrderService $orderService,
    ) {}

    /*
    |--------------------------------------------------------------------------
    | Orders List
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $search = $request->search;

        $orderStatus = $request->order_status;

        $paymentStatus = $request->payment_status;

        $filters = $request->only([
            'search',
            'order_status',
            'payment_status',
        ]);

        $orders = $this->orderService->getFilteredOrders($filters);

        return view(
            'admin.orders.index',
            compact(
                'orders',
                'search',
                'orderStatus',
                'paymentStatus',
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Order Details
    |--------------------------------------------------------------------------
    */

    public function updateStatus(
        UpdateOrderStatusRequest $request,
        Order $order
    ) {
        try {

            $this->orderService->updateStatus(
                $order,
                $request->validated()['order_status']
            );

            return back()->with(
                'success',
                'Order status updated successfully.'
            );
        } catch (DomainException $e) {

            return back()->with(
                'error',
                $e->getMessage()
            );
        }
    }

    public function updatePaymentStatus(
        UpdatePaymentStatusRequest $request,
        Order $order
    ) {
        $this->orderService->updatePaymentStatus(
            $order,
            $request->validated()['payment_status']
        );

        return back()->with(
            'success',
            'Payment status updated successfully.'
        );
    }
    public function show(Order $order)
    {
        $order = $this->orderService->getOrder($order);

        return view(
            'admin.orders.show',
            compact('order')
        );
    }
}
