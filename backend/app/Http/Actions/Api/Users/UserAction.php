<?php
declare(strict_types=1);


namespace App\Http\Actions\Api\Users;

use App\Http\Responses\Users\UserResponse;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use OpenApi\Annotations as OA;

class UserAction
{
    /**
     * @param UserResponse $response
     */
    public function __construct(
        public UserResponse $response,
    )
    {
    }

    /**
     * @OA\Get(
     *     path="/user",
     *     operationId="getUserInfo",
     *     tags={"Users"},
     *     summary="Get user information",
     *     description="Get user information",
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *          response=200,
     *          description="Successful",
     *          @OA\JsonContent(ref="#/components/schemas/UserInfo")
     *       ),
     *     @OA\Response(
     *           response=401,
     *           description="Unauthenticated",
     *           @OA\JsonContent(ref="#/components/schemas/Unauthorized")
     *
     *       ),
     * )
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(): \Illuminate\Http\JsonResponse
    {
        /** @var User $currentUser */
        $currentUser = Auth::user();

        return $this->response->success($currentUser->name, $currentUser->email, $currentUser->tickets);
    }
}
