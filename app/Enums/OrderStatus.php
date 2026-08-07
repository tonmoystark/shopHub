<?php

namespace App\Enums;

enum OrderStatus: string
{
    case Pending = 'pending';

    case Confirmed = 'confirmed';

    case Processing = 'processing';

    case Shipped = 'shipped';

    case Delivered = 'delivered';

    case Cancelled = 'cancelled';

    case Refunded = 'refunded';

    public function label(): string
    {
        return match ($this) {
            self::Pending => 'Pending',
            self::Confirmed => 'Confirmed',
            self::Processing => 'Processing',
            self::Shipped => 'Shipped',
            self::Delivered => 'Delivered',
            self::Cancelled => 'Cancelled',
            self::Refunded => 'Refunded',
        };
    }

    public static function options(): array
    {
        return array_map(
            fn(self $status) => [
                'value' => $status->value,
                'label' => $status->label(),
            ],
            self::cases()
        );
    }
    public function canTransitionTo(self $newStatus): bool
    {
        return in_array($newStatus, match ($this) {

            self::Pending => [
                self::Confirmed,
                self::Cancelled,
            ],

            self::Confirmed => [
                self::Processing,
                self::Cancelled,
            ],

            self::Processing => [
                self::Shipped,
            ],

            self::Shipped => [
                self::Delivered,
            ],

            self::Delivered => [
                self::Refunded,
            ],

            self::Cancelled => [],

            self::Refunded => [],
        }, true);
    }
    public function nextStatuses(): array
    {
        return match ($this) {

            self::Pending => [
                self::Pending,
                self::Confirmed,
                self::Cancelled,
            ],

            self::Confirmed => [
                self::Confirmed,
                self::Processing,
                self::Cancelled,
            ],

            self::Processing => [
                self::Processing,
                self::Shipped,
            ],

            self::Shipped => [
                self::Shipped,
                self::Delivered,
            ],

            self::Delivered => [
                self::Delivered,
                self::Refunded,
            ],

            self::Cancelled => [
                self::Cancelled,
            ],

            self::Refunded => [
                self::Refunded,
            ],
        };
    }
    public function badgeVariant(): string
    {
        return match ($this) {

            self::Delivered => 'success',

            self::Cancelled,
            self::Refunded => 'danger',

            default => 'warning',
        };
    }
}
