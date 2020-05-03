<?php

namespace App\Http\Controllers\Admin\Customers;

use App\Http\Controllers\Admin\Customers\Requests\CustomerStoreRequest;
use App\Http\Controllers\Admin\Customers\Requests\CustomerUpdateRequest;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class CustomerController extends ApiController
{
    public function __construct()
    {
        $this->middleware('transformInput:'. CustomerTransformer::class)->only(['store', 'update']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = new Customer();
        return $this->showAll($customers->getAllCustomers());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerStoreRequest $request)
    {
        $customer = new Customer();
        $newCustomer = $customer->storeCustomer(request());
        return $this->showOne($newCustomer);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = new Customer();
        return $this->showOne($customer->getCustomer($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerUpdateRequest $request, $id)
    {
        $customer = new Customer();
        $updatedCustomer = $customer->updateCustomer(request(), $id);

        if(!$updatedCustomer) {
            return $this->errorResponse('You need to specify different value to update', 422);
        }

        return $this->showOne($updatedCustomer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = new Customer();
        $deletedCustomer = $customer->deleteCustomer($id);
        return $this->showOne($deletedCustomer);
    }
}
