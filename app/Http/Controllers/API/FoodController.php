<?php

namespace App\Http\Controllers\API;

use App\Food;
use App\Http\Resources\Food as FoodResource;
use App\Http\Resources\FoodCollection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FoodController extends Controller
{
    /**
     * @return FoodCollection
     */
    public function index()
    {
        return new FoodCollection(Food::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * @param Food $food
     * @return \App\Http\Resources\Food
     */
    public function show(Food $food): FoodResource
    {
        return new FoodResource($food);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
