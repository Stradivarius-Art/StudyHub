<?php

namespace App\Contracts;

use Illuminate\Http\JsonResponse;

interface AuthInterface
{
    public function register(array $data): JsonResponse;
    public function login(array $data): JsonResponse;
}