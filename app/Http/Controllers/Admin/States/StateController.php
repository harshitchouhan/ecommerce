<?php

namespace App\Http\Controllers\Admin\States;

use App\Http\Controllers\Admin\States\Requests\StateStoreRequest;
use App\Http\Controllers\Admin\States\Requests\StateUpdateRequest;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class StateController extends ApiController
{
    public function __construct()
    {
        $this->middleware('transformInput:'. StateTransformer::class)->only(['store', 'update']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $state = new State();
        return $this->showAll($state->getAllState());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StateStoreRequest $request)
    {
        $state = new State();
        $newState = $state->storeState(request());
        return $this->showOne($newState);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $state = new State();
        return $this->showOne($state->getState($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StateUpdateRequest $request, $id)
    {
        $state = new State();
        $updatedState = $state->updateState(request(), $id);

        if(!$updatedState) {
            return $this->errorResponse('You need to specify different value to update', 422);
        }

        return $this->showOne($updatedState);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $state = new State();
        $deletedState = $state->deleteState($id);
        return $this->showOne($deletedState);
    }
}
