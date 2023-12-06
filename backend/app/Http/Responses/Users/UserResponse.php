<?php
declare(strict_types=1);


namespace App\Http\Responses\Users;

use App\Infrastructure\Responses\Response;
use Illuminate\Http\JsonResponse;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="UserInfo",
 *     title="User Information",
 *     @OA\Property(
 *         property="name",
 *         title="Name",
 *         type="string",
 *         example="Admin"
 *     ),
 *     @OA\Property(
 *          property="email",
 *          title="Email",
 *          type="string",
 *          example="admin@admin.com"
 *      ),
 *      @OA\Property(
 *           property="tickets",
 *           title="Tickets",
 *           type="integer",
 *           example="2000"
 *       ),
 * )
 *
 */
class UserResponse extends Response
{
    /**
     * @param string $name
     * @param string $email
     * @param int $tickets
     * @return JsonResponse
     */
    public function success(string $name, string $email, int $tickets): JsonResponse
    {
        return \response()
            ->json([
                'name' => $name,
                'email' => $email,
                'tickets' => $tickets,
            ]);
    }
}
