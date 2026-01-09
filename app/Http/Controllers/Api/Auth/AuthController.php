<?php

namespace App\Http\Controllers\Api\Auth;

use App\Contracts\AuthInterface;
use App\Data\Auth\LoginData;
use App\Data\Auth\RegisterData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function __construct(
        private readonly AuthInterface $service
    ) {}

    public function register(RegisterRequest $request): JsonResponse
    {
        return $this->service->register($request->toArray());
    }

    public function login(LoginRequest $request): JsonResponse
    {
        return $this->service->login($request->toArray());
    }
}