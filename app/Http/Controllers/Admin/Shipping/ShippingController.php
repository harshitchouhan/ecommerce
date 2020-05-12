<?php

namespace App\Http\Controllers\Admin\Shipping;

use App\Http\Controllers\Admin\Shipping\Requests\ShippingStoreRequest;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class ShippingController extends ApiController
{
    public function __construct()
    {
        $this->middleware('transformInput:'. ShippingTransformer::class)->only(['store', 'update']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shippings = new Shipping();
        return $this->showAll($shippings->getAllShipping());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShippingStoreRequest $request)
    {
        $shipping = new Shipping();
        $newShipping = $shipping->storeShipping(request());
        return $this->showOne($newShipping);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shipping = new Shipping();
        return $this->showOne($shipping->getShipping($id));
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
        $shipping = new Shipping();
        $updatedShipping = $shipping->updateShipping(request(), $id);

        if(!$updatedShipping) {
            return $this->errorResponse('You need to specify different value to update', 422);
        }

        return $this->showOne($updatedShipping);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shipping = new Shipping();
        $deletedShipping = $shipping->deleteShipping($id);
        return $this->showOne($deletedShipping);
    }
}
