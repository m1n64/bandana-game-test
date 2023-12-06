<?php
declare(strict_types=1);


namespace App\Http\Responses\Auth;

use App\Infrastructure\Responses\Response;
use Illuminate\Http\JsonResponse;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="AuthSuccess",
 *     title="Auth Success",
 *     description="Auth success",
 *      @OA\Xml(
 *          name="AuthSuccess"
 *      ),
 *      @OA\Property(
 *          title="access_token",
 *          property="access_token",
 *          type="string",
 *          example="1|hAYuajUAUhskjNAYUiuAN"
 *      ),
 *
 *      @OA\Property(
 *          title="token_type",
 *          property="token_type",
 *          type="string",
 *          example="Bearer"
 *      )
 * )
 *
 * @OA\Schema(
 *     schema="AuthError",
 *     title="Auth Error",
 *     description="Auth error",
 *     @OA\Property(
 *           title="message",
 *           property="message",
 *           type="string",
 *           example=""
 *       ),
 * )
 */
class AuthResponse extends Response
{
    /**
     *
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
