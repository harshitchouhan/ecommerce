<?php

namespace App\Http\Controllers\Admin\City;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['cityname', 'citycode', 'cityactive'];

    public $transformer = CityTransformer::class;

    public function getAllCities()
    {
        $cities = City::all();
        return $cities;
    }

    public function getCity($id)
    {
        $city = City::findOrFail($id);
        return $city;
    }

    public function storeCity($request)
    {
        $data = $request->all();
        $city = City::create($data);
        return $city;
    }

    public function updateCity($request, $id)
    {
        $city = $this->getCity($id);

        if ($request->has('cityname')) {
            $city->cityname = $request->cityname;
        }

        if ($request->has('citycode')) {
            $city->citycode = $request->citycode;
        }

        if ($request->has('cityactive')) {
            $city->cityactive = $request->cityactive;
        }

        if (!$city->isDirty()) {
            return false;
        }

        $city->save();
        return $city;
    }

    public function deleteCity($id)
    {
        $city = $this->getCity($id);
        $city->delete();
        return $city;
    }
}
