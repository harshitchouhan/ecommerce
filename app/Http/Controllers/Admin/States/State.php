<?php

namespace App\Http\Controllers\Admin\States;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = ['statename', 'statecode', 'stateactive'];

    public $transformer = StateTransformer::class;

    public function getAllState()
    {
        $state = State::all();
        return $state;
    }

    public function getState($id)
    {
        $state = State::findOrFail($id);
        return $state;
    }

    public function storeState($request)
    {
        $data = $request->all();
        $state = State::create($data);
        return $state;
    }

    public function updateState($request, $id)
    {
        $state = $this->getState($id);

        if ($request->has('statename')) {
            $state->statename = $request->statename;
        }

        if ($request->has('statecode')) {
            $state->statecode = $request->statecode;
        }

        if ($request->has('stateactive')) {
            $state->stateactive = $request->stateactive;
        }

        if (!$state->isDirty()) {
            return false;
        }

        $state->save();
        return $state;
    }

    public function deleteState($id)
    {
        $state = $this->getState($id);
        $state->delete();
        return $state;
    }
}
