<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

trait ApiResponser
{
    private function successResponse($data, $code)
    {
        return response()->json($data, $code);
    }

    public function errorResponse($message, $code)
    {
        return response()->json(['error' => $message, 'code' => $code], $code);
    }

    protected function showAll(Collection $collection, $code = 200)
    {
        return $this->successResponse(['results' => count($collection), 'data' => $collection], $code);
    }

    protected function showOne(Model $model, $code = 200)
    {
        return $this->successResponse(['results' => 1, 'data' => $model], $code);
    }

    // protected function showOne(JsonResponse $jsonResponse, $code = 422)
    // {
    //     return $this->successResponse(['results' => 1, 'data' => $jsonResponse], $code);
    // }
}
