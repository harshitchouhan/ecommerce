<?php

namespace App\Http\Controllers\Admin\CustomerAddress;

use App\Http\Controllers\Admin\CustomerAddress\Requests\CustomerAddressStoreRequest;
use App\Http\Controllers\Admin\CustomerAddress\Requests\CustomerAddressUpdateRequest;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class CustomerAddressController extends ApiController
{
    public function __construct()
    {
        $this->middleware('transformInput:'. CustomerAddressTransformer::class)->only(['store', 'update']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customerAddress = new CustomerAddress();
        return $this->showAll($customerAddress->getAllCustomerAddress());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerAddressStoreRequest $request)
    {
        $customerAddress = new CustomerAddress();
        $newCustomerAddress = $customerAddress->storeCustomerAddress(request());
        return $this->showOne($newCustomerAddress);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customerAddress = new CustomerAddress();
        return $this->showOne($customerAddress->getCustomerAddress($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerAddressUpdateRequest $request, $id)
    {
        $customerAddress = new CustomerAddress();
        $updatedCustomerAddress = $customerAddress->updateCustomerAddress(request(), $id);

        if(!$updatedCustomerAddress) {
            return $this->errorResponse('You need to specify different value to update', 422);
        }

        return $this->showOne($updatedCustomerAddress);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customerAddress = new CustomerAddress();
        $deletedCustomerAddress = $customerAddress->deleteCustomerAddress($id);
        return $this->showOne($deletedCustomerAddress);
    }
}
