<?php

namespace App\Http\Controllers\API;

use App\City;
use App\Http\Resources\CityCollection;
use App\Http\Resources\City as CityResource;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    /**
     * @return CityCollection
     */
    public function index()
    {
        $cities = City::query()
            ->paginate(100);

        return new CityCollection($cities);
    }


    /**
     * @param City $city
     * @return CityResource
     */
    public function show(City $city): CityResource
    {
        return new CityResource($city);
    }
}
