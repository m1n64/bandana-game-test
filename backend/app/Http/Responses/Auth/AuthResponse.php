<?php
declare(strict_types=1);


namespace App\Http\Responses\Auth;

use App\Infrastructure\Responses\Response;
use Illuminate\Http\JsonResponse;

class AuthResponse extends Response
{
    /**
     * @param $token
     * @return JsonResponse
     */
    public function success($token): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }
}
