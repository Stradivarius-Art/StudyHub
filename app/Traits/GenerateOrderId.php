<?php

namespace App\Traits;

use App\Models\Order;
use Illuminate\Support\Str;

trait GenerateOrderId
{
    public function generateOrderId(): string
    {
        do {
            $orderId = 'ORD-' . strtoupper(Str::random(10));
        } while (Order::where('order_id', $orderId)->exists());

        return $orderId;
    }
}