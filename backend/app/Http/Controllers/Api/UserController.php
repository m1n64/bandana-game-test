<?php

namespace App\Http\Controllers\Api;

use App\Http\Actions\Api\Users\UserAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @param UserAction $action
     * @return JsonResponse
     */
    public function info(UserAction $action): \Illuminate\Http\JsonResponse
    {
        return $action();
    }
}
