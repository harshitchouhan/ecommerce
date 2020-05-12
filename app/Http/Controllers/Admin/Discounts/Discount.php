<?php

namespace App\Http\Controllers\Admin\Discounts;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = ['dname', 'dcode', 'dvalue', 'dtype', 'duses', 'dstartdate', 'dexpirydate', 'dactive', 'dbasis'];

    public $transformer = DiscountTransformer::class;

    public function getAllDiscounts() {
        $discounts = Discount::all();
        return $discounts;
    }

    public function getDiscount($id) {
        $discount = Discount::findOrFail($id);
        return $discount;
    }

    public function storeDiscount($request) {
        $data = $request->all();
        $data['dactive'] = 0;

        $discount = Discount::create($data);
        return $discount;
    }

    public function updateDiscount($request, $id)
    {
        $Discount = $this->getDiscount($id);

        if ($request->has('dname')) {
            $Discount->dname = $request->dname;
        }

        if ($request->has('dcode')) {
            $Discount->dcode = $request->dcode;
        }

        if ($request->has('dvalue')) {
            $Discount->dvalue = $request->dvalue;
        }

        if ($request->has('dtype')) {
            $Discount->dtype = $request->dtype;
        }

        if ($request->has('duses')) {
            $Discount->duses = $request->duses;
        }

        if ($request->has('dstartdate')) {
            $Discount->dstartdate = $request->dstartdate;
        }

        if ($request->has('dexpirydate')) {
            $Discount->dexpirydate = $request->dexpirydate;
        }

        if ($request->has('dactive')) {
            $Discount->dactive = $request->dactive;
        }

        if ($request->has('dbasis')) {
            $Discount->dbasis = $request->dbasis;
        }

        if (!$Discount->isDirty()) {
            return false;
        }

        $Discount->save();
        return $Discount;
    }

    public function deleteDiscount($id)
    {
        $discount = $this->getDiscount($id);
        $discount->delete();
        return $discount;
    }
}
