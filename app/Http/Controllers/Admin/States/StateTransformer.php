<?php

namespace App\Http\Controllers\Admin\States;

use League\Fractal\TransformerAbstract;

class StateTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(State $state)
    {
        return [
            'id' => $state->id,
            'Name' => $state->statename,
            'Code' => $state->statecode,
            'Status' => $state->stateactive,
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'Name' => 'statename',
            'Code' => 'statecode',
            'Status' => 'stateactive',
            'created_at' => 'created_at',
            'updated_at' => 'updated_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'statename' => 'Name',
            'statecode' => 'Code',
            'stateactive' => 'Status',
            'created_at' => 'created_at',
            'updated_at' => 'updated_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
