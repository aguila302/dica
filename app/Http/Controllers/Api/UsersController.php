<?php

namespace App\Http\Controllers\Api;

use App\Transformers\UserTransformer;
use Illuminate\Http\Request;

class UsersController extends ApiController
{
    /**
     * Responde a un listado de usuario con autopistas asignadas.

     * @return Illuminate\Http\Response
     */
    public function user(Request $request)
    {
        $user = $request->user();

        return $this->respondWithItem($user, new UserTransformer);
    }
}
