<?php
declare(strict_types=1);


namespace App\Infrastructure\Responses;

use Illuminate\Http\JsonResponse;

class Response
{
    /**
     * @param string $message
     * @param int $statusCode
     * @return JsonResponse
     */
    public function error(string $message, int $statusCode): JsonResponse
    {
        return response()
            ->json(['message' => $message], $statusCode);
    }
}
