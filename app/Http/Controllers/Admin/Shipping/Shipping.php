<?php

namespace App\Http\Controllers\Admin\Shipping;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable = ['sptitle', 'sprate', 'spstate', 'spactive'];

    public $transformer = ShippingTransformer::class;

    public function getAllShipping() {
        $shippings = Shipping::all();
        return $shippings;
    }

    public function getShipping($id) {
        $shipping = Shipping::findOrFail($id);
        return $shipping;
    }

    public function storeShipping($request) {
        $data = $request->all();
        $data['spactive'] = '0';
        $shipping = Shipping::create($data);
        return $shipping;
    }

    public function updateShipping($request, $id)
    {
        $shipping = $this->getShipping($id);

        if ($request->has('sptitle')) {
            $shipping->sptitle = $request->sptitle;
        }

        if ($request->has('sprate')) {
            $shipping->sprate = $request->sprate;
        }

        if ($request->has('spstate')) {
            $shipping->spstate = $request->spstate;
        }

        if ($request->has('spactive')) {
            $shipping->spactive = $request->spactive;
        }

        if (!$shipping->isDirty()) {
            return false;
        }

        $shipping->save();
        return $shipping;
    }

    public function deleteShipping($id)
    {
        $shipping = $this->getShipping($id);
        $shipping->delete();
        return $shipping;
    }
}
