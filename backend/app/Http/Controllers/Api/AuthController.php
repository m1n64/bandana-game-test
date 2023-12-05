<?php

namespace App\Http\Controllers\Api;

use App\Dto\Auth\LoginDto;
use App\Dto\Auth\RegisterDto;
use App\Http\Actions\Api\Auth\LoginAction;
use App\Http\Actions\Api\Auth\RegisterAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    /**
     * @param RegisterRequest $request
     * @param RegisterAction $action
     * @return JsonResponse
     */
    public function register(RegisterRequest $request, RegisterAction $action): JsonResponse
    {
        $registerDto = new RegisterDto(...$request->validated());

        return $action($registerDto);
    }

    /**
     * @param LoginRequest $request
     * @param LoginAction $action
     * @return JsonResponse
     */
    public function login(LoginRequest $request, LoginAction $action): JsonResponse
    {
        $loginDto = new LoginDto(...$request->validated());

        return $action($loginDto);
    }
}
