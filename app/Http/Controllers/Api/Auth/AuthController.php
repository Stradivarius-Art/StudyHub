<?php

namespace App\Http\Controllers\Api\Auth;

use App\Contracts\AuthInterface;
use App\Data\Auth\LoginData;
use App\Data\Auth\RegisterData;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function __construct(
        private readonly AuthInterface $service
    ) {}

    public function register(RegisterData $data): JsonResponse
    {
        return $this->service->register($data->toArray());
    }

    public function login(LoginData $data): JsonResponse
    {
        return $this->service->login($data->toArray());
    }
}