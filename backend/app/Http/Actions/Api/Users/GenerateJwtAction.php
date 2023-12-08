<?php
declare(strict_types=1);


namespace App\Http\Actions\Api\Users;

use Firebase\JWT\JWK;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Nette\Utils\Random;

class GenerateJwtAction
{
    /**
     * @return JsonResponse
     */
    public function __invoke(): \Illuminate\Http\JsonResponse
    {
        $key = env("CENTRIFUGO_TOKEN_SECRET");

        $payload = [
            'sub' => Auth::id() ?? Random::generate(10, '0-9'),
            'exp' => time() + 3600,
        ];

        $jwt = JWT::encode($payload, $key, 'HS256');

        return response()
            ->json(['jwt_token' => $jwt]);
    }
}
