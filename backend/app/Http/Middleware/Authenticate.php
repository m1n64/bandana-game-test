<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *      schema="Unauthorized",
 *      title="Unauthorized",
 *      @OA\Property(
 *          property="message",
 *          title="Message",
 *          type="string",
 *          example="Unauthorized"
 *      )
 *  )
*/
class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }
}
