<?php

namespace App\Http\Controllers\Admin\Discounts;

use App\Http\Controllers\Admin\Discounts\Requests\DiscountStoreRequest;
use App\Http\Controllers\Admin\Discounts\Requests\DiscountUpdateRequest;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class DiscountController extends ApiController
{
    public function __construct()
    {
        $this->middleware('transformInput:'. DiscountTransformer::class)->only(['store', 'update']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dicounts = new Discount();
        return $this->showAll($dicounts->getAllDiscounts());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiscountStoreRequest $request)
    {
        $discount = new Discount();
        $newDiscount = $discount->storeDiscount(request());
        return $this->showOne($newDiscount);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dicount = new Discount();
        return $this->showOne($dicount->getDiscount($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DiscountUpdateRequest $request, $id)
    {
        $discount = new Discount();
        $updatedDiscount = $discount->updateDiscount(request(), $id);

        if(!$updatedDiscount) {
            return $this->errorResponse('You need to specify different value to update', 422);
        }

        return $this->showOne($updatedDiscount);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $discount = new Discount();
        $deletedDiscount = $discount->deleteDiscount($id);
        return $this->showOne($deletedDiscount);
    }
}
