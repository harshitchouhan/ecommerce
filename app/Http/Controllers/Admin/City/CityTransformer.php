<?php

namespace App\Http\Controllers\Admin\City;

use League\Fractal\TransformerAbstract;

class CityTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(City $city)
    {
        return [
            'id' => $city->id,
            'Name' => $city->cityname,
            'Code' => $city->citycode,
            'Status' => $city->cityactive,
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'Name' => 'cityname',
            'Code' => 'citycode',
            'Status' => 'cityactive',
            'created_at' => 'created_at',
            'updated_at' => 'updated_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'cityname' => 'Name',
            'citycode' => 'Code',
            'cityactive' => 'Status',
            'created_at' => 'created_at',
            'updated_at' => 'updated_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
