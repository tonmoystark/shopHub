<?php

namespace App\Enums;

enum PaymentMethod: string
{
    case CashOnDelivery = 'cash_on_delivery';

    case SSLCommerz = 'sslcommerz';

    case Stripe = 'stripe';
}
