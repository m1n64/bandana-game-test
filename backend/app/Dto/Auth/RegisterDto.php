<?php
declare(strict_types=1);


namespace App\Dto\Auth;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="RegisterRequest",
 *     title="Register Request",
 *     @OA\Property(
 *          property="name",
 *          title="Name",
 *          type="string",
 *          example="Admin",
 *      ),
 *     @OA\Property(
 *         property="email",
 *         title="Email",
 *         type="string",
 *         example="admin@admin.com",
 *     ),
 *     @OA\Property(
 *          property="password",
 *          title="Password",
 *          type="string",
 *          example="admin123",
 *      ),
 * )
 */
class RegisterDto
{
    /**
     * @param string $name
     * @param string $email
     * @param string $password
     */
    public function __construct(
        public string $name,
        public string $email,
        public string $password
    )
    {
    }
}
