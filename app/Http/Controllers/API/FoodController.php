<?php

namespace App\Http\Controllers\API;

use App\Food;
use App\Http\Requests\FoodSearchRequest;
use App\Http\Resources\Food as FoodResource;
use App\Http\Resources\FoodCollection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FoodController extends Controller
{
    /**
     * @return FoodCollection
     */
    public function index(FoodSearchRequest $request)
    {
        $query = Food::query();

        if ($cityId = $request->get('city_id')) {
            $query->where('city_id', $cityId);
        }

        if ($priceMin = $request->get('price_min')) {
            $query->where('price', '>=',  $priceMin);
        }

        if ($priceMax = $request->get('price_max')) {
            $query->where('price', '<=',  $priceMax);
        }

        if ($feedsCount = $request->get('feeds_count')) {
            $query->where('feeds_count', $feedsCount);
        }

        if ($searchTerm = $request->get('q')) {
            $query->where(function($query) use ($searchTerm) {
                return $query->where('ingredients', 'LIKE', "%$searchTerm%")
                    ->orWhere('title', 'LIKE', "%$searchTerm%");
            });
        }

        $orderBy = strtolower($request->get('sort'));
        $orderDirection = strtoupper($request->get('direction')) ?? 'DESC';
        if (
            $orderBy
            && in_array($orderBy, ['city_id', 'created_at', 'price', 'feeds_count'])
            && in_array($orderDirection, ['ASC', 'DESC'])
        ) {
            $query->orderBy($orderBy, $orderDirection);
        }


        return new FoodCollection($query->paginate());
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
