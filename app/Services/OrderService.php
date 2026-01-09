<?php

namespace App\Services;

use App\Contracts\OrderInterface;
use App\Models\Order;
use Illuminate\Support\Str;
use App\Enums\PaymentStatus;
use App\Traits\GenerateOrderId;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Order\OrderResponse;
use Illuminate\Http\JsonResponse;

class OrderService implements OrderInterface
{
    use GenerateOrderId;

    public function index(): JsonResponse
    {
        $orders = auth()->user()
            ->orders()
            ->with('course')
            ->get();

        return response()->json([
            'data' => OrderResponse::collection($orders)
        ]);
    }

    public function create(array $data): Model
    {
        return Order::query()->create([
            'user_id' => auth()->user()->id,
            'course_id' => $data['course_id'],
            'order_id' => $this->generateOrderId(),
            'payment_status' => PaymentStatus::PENDING->value,
            'amount' => $data['amount']
        ]);
    }

    public function cancellingAppointment(int $id): JsonResponse
    {
        $order = Order::query()
            ->where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        if ($order->payment_status === PaymentStatus::SUCCESS->value) {
            return response()->json([
                'status' => 'was payed'
            ], 418);
        }

        $order->delete();

        return response()->json([
            'status' => 'success'
        ], 200);
    }
}