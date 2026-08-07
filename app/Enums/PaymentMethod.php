<?php

namespace App\Enums;

enum PaymentMethod: string
{
    case CashOnDelivery = 'cash_on_delivery';

    case SSLCommerz = 'sslcommerz';

    case Stripe = 'stripe';

    public function label(): string
    {
        return match ($this) {
            self::CashOnDelivery => 'Cash on Delivery',
            self::SSLCommerz => 'SSLCOMMERZ',
            self::Stripe => 'Stripe',
        };
    }

    public static function options(): array
    {
        return array_map(
            fn(self $method) => [
                'value' => $method->value,
                'label' => $method->label(),
            ],
            self::cases()
        );
    }

    public function badgeVariant(): string
    {
        return match ($this) {

            self::Paid => 'success',

            self::Failed => 'danger',

            default => 'warning',
        };
    }
}
