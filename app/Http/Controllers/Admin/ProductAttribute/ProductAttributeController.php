<?php

namespace App\Http\Controllers\Admin\ProductAttribute;

use App\Http\Controllers\Admin\ProductAttribute\Requests\ProductAttributeStoreRequest;
use App\Http\Controllers\Admin\ProductAttribute\Requests\ProductAttributeUpdateRequest;
use App\Http\Controllers\Admin\Products\ProductTransformer;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class ProductAttributeController extends ApiController
{
    public function __construct()
    {
        $this->middleware('transformInput:'. ProductAttributeTransformer::class)->only(['store', 'update']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productAttributes = new ProductAttribute();
        return $this->showAll($productAttributes->getAllProductAttributes());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductAttributeStoreRequest $request)
    {
        $productAttribute = new ProductAttribute();
        $newProductAttribute = $productAttribute->storeProductAttribute(request());
        return $this->showOne($newProductAttribute);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productAttribute = new ProductAttribute();
        return $this->showOne($productAttribute->getProductAttribute($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductAttributeUpdateRequest $request, $id)
    {
        $productAttribute = new ProductAttribute();
        $updatedProductAttribute = $productAttribute->updateProductAttribute(request(), $id);

        if(!$updatedProductAttribute) {
            return $this->errorResponse('You need to specify different value to update', 422);
        }

        return $this->showOne($updatedProductAttribute);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productAttribute = new ProductAttribute();
        $deletedProductAttribute = $productAttribute->deleteProductAttribute($id);
        return $this->showOne($deletedProductAttribute);
    }
}
