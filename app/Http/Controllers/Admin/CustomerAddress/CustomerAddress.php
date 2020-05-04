<?php

namespace App\Http\Controllers\Admin\CustomerAddress;

use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    protected $fillable = ['caownername', 'caaddressline1', 'caaddressline2', 'cacity', 'castate', 'cazipcode'];

    public $transformer = CustomerAddressTransformer::class;

    public function getAllCustomerAddress()
    {
        $customerAddress = CustomerAddress::all();
        return $customerAddress;
    }

    public function getCustomerAddress($id)
    {
        $customerAddress = CustomerAddress::findOrFail($id);
        return $customerAddress;
    }

    public function storeCustomerAddress($request)
    {
        $data = $request->all();
        $customerAddress = CustomerAddress::create($data);
        return $customerAddress;
    }

    public function updateCustomerAddress($request, $id)
    {
        $customerAddress = $this->getCustomerAddress($id);

        if ($request->has('caownername')) {
            $customerAddress->caownername = $request->caownername;
        }

        if ($request->has('caaddressline1')) {
            $customerAddress->caaddressline1 = $request->caaddressline1;
        }

        if ($request->has('caaddressline2')) {
            $customerAddress->caaddressline2 = $request->caaddressline2;
        }

        if ($request->has('cacity')) {
            $customerAddress->cacity = $request->cacity;
        }

        if ($request->has('castate')) {
            $customerAddress->castate = $request->castate;
        }

        if ($request->has('cazipcode')) {
            $customerAddress->cazipcode = $request->cazipcode;
        }

        if (!$customerAddress->isDirty()) {
            return false;
        }

        $customerAddress->save();
        return $customerAddress;
    }

    public function deleteCustomerAddress($id)
    {
        $customerAddress = $this->getCustomerAddress($id);
        $customerAddress->delete();
        return $customerAddress;
    }

}
