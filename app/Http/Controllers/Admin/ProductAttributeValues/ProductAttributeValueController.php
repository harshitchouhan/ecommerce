<?php

namespace App\Http\Controllers\Admin\ProductAttributeValues;

use App\Http\Controllers\Admin\ProductAttributeValues\Requests\ProductAttributeValueStoreRequest;
use App\Http\Controllers\Admin\ProductAttributeValues\Requests\ProductAttributeValueUpdateRequest;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class ProductAttributeValueController extends ApiController
{
    public function __construct()
    {
        $this->middleware('transformInput:'. ProductAttributeValueTransformer::class)->only(['store', 'update']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productAttributeValues = new ProductAttributeValue();
        return $this->showAll($productAttributeValues->getAllProductAttributeValues());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductAttributeValueStoreRequest $request)
    {
        $productAttributeValue = new ProductAttributeValue();
        $newProductAttributeValue = $productAttributeValue->storeProductAttributeValue(request());
        return $this->showOne($newProductAttributeValue);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productAttributeValue = new ProductAttributeValue();
        return $this->showOne($productAttributeValue->getProductAttributeValue($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductAttributeValueUpdateRequest $request, $id)
    {
        $productAttributeValue = new ProductAttributeValue();

        $updatedProductAttributeValue = $productAttributeValue->updateProductAttributeValue(request(), $id);

        if(!$updatedProductAttributeValue) {
            return $this->errorResponse('You need to specify different value to update', 422);
        }

        return $this->showOne($updatedProductAttributeValue);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productAttributeValue = new ProductAttributeValue();
        $deletedProductAttributeValue = $productAttributeValue->deleteProductAttributeValue($id);
        return $this->showOne($deletedProductAttributeValue);
    }
}
