<?php
declare(strict_types=1);


namespace App\Http\Actions\Api\Auth;

use App\Dto\Auth\LoginDto;
use App\Http\Responses\Auth\AuthResponse;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class LoginAction
{
    /**
     * @param AuthResponse $authResponse
     */
    public function __construct(
        protected AuthResponse $authResponse,
    )
    {
    }

    /**
     * @param LoginDto $loginDto
     * @return JsonResponse
     */
    public function __invoke(LoginDto $loginDto): \Illuminate\Http\JsonResponse
    {
        if (!Auth::attempt($loginDto->toArray())) {
            return $this->authResponse->error('Invalid credentials', 401);
        }

        $user = User::where('email', $loginDto->email)->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;

        return $this->authResponse->success($token);
    }
}
