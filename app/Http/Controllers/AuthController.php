<?php

namespace App\Http\Controllers;

use App\Contracts\Repository\UserRepository;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function __construct(public UserRepository $userRepository)
    {
    }

    /**
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {
        if (! $token = auth()->attempt($request->only([
            'username', 'password'
        ]))) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function register(RegisterRequest $request): UserResource
    {
        return UserResource::make(
            $this->userRepository->create($request->getStoreData())
        );
    }

    public function me()
    {
        return UserResource::make(
            auth()->user()
        );
    }
}
