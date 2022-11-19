<?php



namespace App\Http\Controllers\Api\V1;;

use App\Http\Controllers\Controller;
use App\Models\Publicher;
use App\Http\Requests\StorePublicherRequest;
use App\Http\Requests\UpdatePublicherRequest;

class PublicherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePublicherRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePublicherRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publicher  $publicher
     * @return \Illuminate\Http\Response
     */
    public function show(Publicher $publicher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePublicherRequest  $request
     * @param  \App\Models\Publicher  $publicher
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePublicherRequest $request, Publicher $publicher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publicher  $publicher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publicher $publicher)
    {
        //
    }
}
