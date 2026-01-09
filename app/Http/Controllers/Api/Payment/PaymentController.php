<?php

namespace App\Http\Controllers\Api\Payment;

use Illuminate\Http\JsonResponse;
use App\Contracts\PaymentInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Payment\PaymentRequest;

class PaymentController extends Controller
{
    public function webhook(PaymentInterface $action, PaymentRequest $request): JsonResponse
    {
        return $action->handleWebhook($request->toArray());
    }
}