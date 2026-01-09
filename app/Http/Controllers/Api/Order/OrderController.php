<?php

namespace App\Http\Controllers\Api\Order;

use App\Models\Order;
use App\Contracts\OrderInterface;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\Order\OrderRequest;

class OrderController extends Controller
{
    public function __construct(
        private readonly OrderInterface $service
    ) {}

    public function index(): JsonResponse
    {
        return $this->service->index();
    }

    public function create(OrderRequest $request): Model
    {
        return $this->service->create($request->toArray());
    }

    public function cancel(Order $order): JsonResponse
    {
        return $this->service->cancellingAppointment($order->id);
    }
}