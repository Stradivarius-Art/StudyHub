<?php

namespace App\Actions;

use App\Models\Order;
use App\Enums\PaymentStatus;
use Illuminate\Http\JsonResponse;
use App\Contracts\PaymentInterface;

class PaymentAction implements PaymentInterface
{
    public function handleWebhook(array $data): JsonResponse
    {
        /**
         * @var Order $order
         */
        $order = Order::where('order_id', $data['order_id'])->first();

        if (!$order) {
            return response()->json([], 204);
        }

        if (\in_array(
            $data['status'],
            [PaymentStatus::SUCCESS->value, PaymentStatus::FAILED->value]
        )) {
            $order->payment_status = $data['status'];
            $order->save();
        }

        return response()->json([], 204);
    }
}