<?php

namespace App\Contracts;

use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\Model;

interface OrderInterface
{
    public function index(): JsonResponse;
    public function create(array $data): Model;
    public function cancellingAppointment(int $id): JsonResponse;
}