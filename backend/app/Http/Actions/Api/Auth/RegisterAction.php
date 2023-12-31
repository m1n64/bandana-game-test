<?php
declare(strict_types=1);


namespace App\Http\Actions\Api\Auth;

use App\Dto\Auth\RegisterDto;
use App\Http\Responses\Auth\AuthResponse;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use OpenApi\Annotations as OA;

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
     * @OA\Post(
     *        path="/auth/register",
     *        operationId="register",
     *        tags={"Auth"},
     *        summary="Register",
     *        description="Register",
     *        @OA\RequestBody(
     *            required=true,
     *            description="Data for register",
     *            @OA\JsonContent(ref="#/components/schemas/RegisterRequest")
     *        ),
     *        @OA\Response(
     *            response=200,
     *            description="Successful",
     *            @OA\JsonContent(ref="#/components/schemas/AuthSuccess")
     *         )
     *       )
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
