<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ApiErrorResponse;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    use ApiErrorResponse;

    /**
     * @param $item
     * @param $transformer
     * @return mixed
     */
    protected function respondWithItem($item, $transformer)
    {
        return $this->respondWithArray(
            fractal()
                ->item($item)
                ->transformWith($transformer)
                ->toArray()
        );
    }

    /**
     * @param $collection
     * @param $transformer
     * @return mixed
     */
    protected function respondWithCollection($collection, $transformer)
    {
        return $this->respondWithArray(
            fractal()
                ->collection($collection)
                ->transformWith($transformer)
                ->toArray()
        );
    }
}
