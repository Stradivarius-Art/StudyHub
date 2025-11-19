<?php

namespace App\Services;

use App\Contracts\AuthInterface;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class AuthService implements AuthInterface
{
    public function register(array $data): JsonResponse
    {
        User::query()->create([
            'email' => $data['email'],
            'password' => $data['password'],
        ]);

        return response()->json(['status' => true], 201);
    }

    public function login(array $data): JsonResponse
    {
        $user = User::query()->where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return \response()->json([
                'message' => 'Forbidden for you'
            ], 403);
        }

        $token = $user->createToken('Auth token')->plainTextToken;

        return response()->json(['token' => $token]);
    }
}