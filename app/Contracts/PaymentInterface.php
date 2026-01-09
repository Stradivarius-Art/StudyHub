<?php

namespace App\Contracts;

use Illuminate\Http\JsonResponse;

interface PaymentInterface
{
    public function handleWebhook(array $data): JsonResponse;
}