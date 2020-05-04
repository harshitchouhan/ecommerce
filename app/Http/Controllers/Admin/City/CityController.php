<?php

namespace App\Http\Controllers\Admin\City;

use App\Http\Controllers\Admin\City\Requests\CityStoreRequest;
use App\Http\Controllers\Admin\City\Requests\CityUpdateRequest;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class CityController extends ApiController
{
    public function __construct()
    {
        $this->middleware('transformInput:'. CityTransformer::class)->only(['store', 'update']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = new City();
        return $this->showAll($cities->getAllCities());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityStoreRequest $request)
    {
        $city = new City();
        $newCity = $city->storeCity(request());
        return $this->showOne($newCity);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $city = new City();
        return $this->showOne($city->getCity($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CityUpdateRequest $request, $id)
    {
        $city = new City();
        $updatedCity = $city->updateCity(request(), $id);

        if(!$updatedCity) {
            return $this->errorResponse('You need to specify different value to update', 422);
        }

        return $this->showOne($updatedCity);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = new City();
        $deletedCity = $city->deleteCity($id);
        return $this->showOne($deletedCity);
    }
}
