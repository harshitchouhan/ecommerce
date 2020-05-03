<?php

namespace App\Http\Controllers\Admin\ProductAttributeRelations;

use App\Http\Controllers\Admin\ProductAttributeRelations\ProductAttributeRelation;
use App\Http\Controllers\Admin\ProductAttributeRelations\Requests\ProductAttributeRelationsStoreRequest;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class ProductAttributeRelationController extends ApiController
{
    public function __construct()
    {
        $this->middleware('transformInput:'. ProductAttributeRelationTransformer::class)->only(['store', 'update']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productAttributeRelations = new ProductAttributeRelation();
        return $this->showAll($productAttributeRelations->getAllProductAttributeRelation());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductAttributeRelationsStoreRequest $request)
    {
        $productAttributeRelation = new ProductAttributeRelation();
        $newProductAttributeRelation = $productAttributeRelation->storeProductAttributeRelation(request());
        return $this->showOne($newProductAttributeRelation);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productAttributeRelation = new ProductAttributeRelation();
        return $this->showOne($productAttributeRelation->getProductAttributeRelation($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $productAttributeRelation = new ProductAttributeRelation();

        $updatedProductAttributeRelation = $productAttributeRelation->updateProductAttributeRelation(request(), $id);

        if(!$updatedProductAttributeRelation) {
            return $this->errorResponse('You need to specify different value to update', 422);
        }

        return $this->showOne($updatedProductAttributeRelation);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productAttributeRelation = new ProductAttributeRelation();
        $deletedProductAttributeRelation = $productAttributeRelation->deleteProductAttribute($id);
        return $this->showOne($deletedProductAttributeRelation);
    }
}
