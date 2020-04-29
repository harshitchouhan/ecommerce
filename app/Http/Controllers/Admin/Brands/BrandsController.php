<?php

namespace App\Http\Controllers\Admin\Brands;


use App\Http\Controllers\ApiController;
use App\Http\Requests\Brands\BrandStoreRequest;
use App\Http\Requests\Brands\BrandUpdateRequest;
use Illuminate\Http\Request;

class BrandsController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand = new Brand();
        $brands = $brand->getAllBrands();
        return $this->showAll($brands);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandStoreRequest $request)
    {
        $brand = new Brand();
        $newBrand = $brand->storeBrand(request());
        return $this->showOne($newBrand);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand = new Brand();
        return $this->showOne($brand->getBrand($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(BrandUpdateRequest $request, $id)
    {
        $brand = new Brand();
        $updatedBrand = $brand->updateBrand(request(), $id);

        if(!$updatedBrand) {
            return $this->errorResponse('You need to specify different value to update', 422);
        }

        return $this->showOne($updatedBrand);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = new Brand();
        $deletedBrand = $brand->deleteBrand($id);
        return $this->showOne($deletedBrand);
    }
}
