<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Admin\Products\Requests\ProductStoreRequest;
use App\Http\Controllers\Admin\Products\Requests\ProductUpdateRequest;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class ProductsController extends ApiController
{

    public function __construct()
    {
        $this->middleware('transformInput:'. ProductTransformer::class)->only(['store', 'update']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = new Product();
        return $this->showAll($products->getAllProducts());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        $product = new  Product();
        $newProduct = $product->storeProduct(request());
        return $this->showOne($newProduct);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = new Product();
        return $this->showOne($product->getProduct($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, $id)
    {
        $product = new Product();
        $updatedProduct = $product->updateProduct(request(), $id);

        if(!$updatedProduct) {
            return $this->errorResponse('You need to specify different value to update', 422);
        }

        return $this->showOne($updatedProduct);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = new Product();
        $deletedProduct = $product->deleteProduct($id);
        return $this->showOne($deletedProduct);
    }
}
