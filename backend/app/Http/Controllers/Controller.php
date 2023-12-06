<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *       version="1.0.0",
 *       title="SpinCash API",
 *       description="SpinCash API Demo",
 *  )
 *
 * @OA\Server(
 *       url=L5_SWAGGER_CONST_HOST,
 *       description="Demo API Server"
 *  )
 *
 * @OA\SecurityScheme(
 *       securityScheme="bearerAuth",
 *       type="http",
 *       scheme="bearer"
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
