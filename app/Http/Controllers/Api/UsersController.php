<?php

namespace App\Http\Controllers\Api;

use App\Transformers\UserTransformer;
use Illuminate\Http\Request;

class UsersController extends ApiController
{
    public function user(Request $request)
    {
        $user = $request->user();

        return $this->respondWithItem($user, new UserTransformer);
    }
}
