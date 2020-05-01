<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Spatie\Fractal\Facades\Fractal;

trait ApiResponser
{
    private function successResponse($data, $code)
    {
        return response()->json([
            'results' => $data['results'],
            'data' => $data['data'],
        ], $code);
    }

    public function errorResponse($message, $code)
    {
        return response()->json(['error' => $message, 'code' => $code], $code);
    }

    protected function showAll(Collection $collection, $code = 200)
    {
        if ($collection->isEmpty()) {
            return $this->successResponse($collection, $code);
        }

        $transformer = $collection->first()->transformer;
        $collection = $this->transformData($collection, $transformer);
        $collection['results'] = count($collection['data']);
        return $this->successResponse($collection, $code);
    }

    protected function showOne(Model $model, $code = 200)
    {
        $transformer = $model->transformer;
        $model = $this->transformData($model, $transformer);
        $model['results'] = 1;
        return $this->successResponse($model, $code);
    }

    protected function transformData($data, $transformer)
    {
        $transformation = Fractal($data, new $transformer);
        return $transformation->toArray();
    }
}
