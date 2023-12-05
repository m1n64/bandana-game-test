<?php
declare(strict_types=1);


namespace App\Http\Actions\Api\Auth;

use App\Dto\Auth\RegisterDto;
use App\Http\Responses\Auth\AuthResponse;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class RegisterAction
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
     * @param RegisterDto $registerDto
     * @return JsonResponse
     */
    public function __invoke(RegisterDto $registerDto): \Illuminate\Http\JsonResponse
    {
        $user = User::create([
            'name' => $registerDto->name,
            'email' => $registerDto->email,
            'password' => Hash::make($registerDto->password),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return $this->authResponse->success($token);
    }
}
