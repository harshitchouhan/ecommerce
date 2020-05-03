<?php

namespace App\Http\Controllers\Admin\Customers;

use App\Traits\ImageUpload;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use ImageUpload;

    protected $fillable = ['cname', 'cemail', 'cimage', 'caddressline1', 'caddressline2', 'ccity', 'cstate', 'czipcode', 'cgoogleid', 'cfaceboookid', 'clinkedinid', 'cstatus', 'cphone', 'calternatephone'];

    public $transformer = CustomerTransformer::class;

    public function getAllCustomers()
    {
        $customers = Customer::all();
        return $customers;
    }

    public function getCustomer($id)
    {
        $customer = Customer::findOrFail($id);
        return $customer;
    }

    public function storeCustomer($request)
    {
        $data = $request->all();

        if ($request->has('image')) {
            $filePath = $this->getImage($request, 'image', $request->cname, 'customers');
            $data['cimage'] = 'http://ecommerce.test/app/public' . $filePath;
        }

        $data['cstatus'] = '0';

        $customer = Customer::create($data);
        return $customer;
    }

    public function updateCustomer($request, $id)
    {
        $customer = $this->getCustomer($id);

        if ($request->has('cname')) {
            $customer->cname = $request->cname;
        }

        if ($request->has('cemail')) {
            $customer->cemail = $request->cemail;
        }

        if ($request->has('cemail')) {
            $customer->cemail = $request->cemail;
        }

        if ($request->has('image')) {
            $filePath = $this->getImage($request, 'image', $request->cname, 'customers');
            $data['cimage'] = 'http://ecommerce.test/app/public' . $filePath;
        }

        if ($request->has('caddressline1')) {
            $customer->caddressline1 = $request->caddressline1;
        }

        if ($request->has('caddressline2')) {
            $customer->caddressline2 = $request->caddressline2;
        }

        if ($request->has('ccity')) {
            $customer->ccity = $request->ccity;
        }

        if ($request->has('cstate')) {
            $customer->cstate = $request->cstate;
        }

        if ($request->has('czipcode')) {
            $customer->czipcode = $request->czipcode;
        }

        if ($request->has('cgoogleid')) {
            $customer->cgoogleid = $request->cgoogleid;
        }

        if ($request->has('cfaceboookid')) {
            $customer->cfaceboookid = $request->cfaceboookid;
        }

        if ($request->has('clinkedinid')) {
            $customer->clinkedinid = $request->clinkedinid;
        }

        if ($request->has('cstatus')) {
            $customer->cstatus = $request->cstatus;
        }

        if ($request->has('cphone')) {
            $customer->cphone = $request->cphone;
        }

        if ($request->has('calternatephone')) {
            $customer->calternatephone = $request->calternatephone;
        }

        if (!$customer->isDirty()) {
            return false;
        }

        $customer->save();
        return $customer;
    }

    public function deleteCustomer($id)
    {
        $customer = $this->getCustomer($id);
        $this->imageDelete(str_replace('http://ecommerce.test/app/public', '', $customer->cimage));
        $customer->delete();
        return $customer;
    }
}
