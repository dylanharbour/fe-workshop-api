<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CitiesSeeder extends Seeder
{
    /**
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function run()
    {
        $files = Storage::disk('local')
            ->get('citiesOverPop5000.json');

        $data = collect(json_decode($files,1))
            ->where('country_code', 'ZA')
            ->sortByDesc('population')
            ->take('30')
            ->each(function ($data) {
                \App\City::firstOrCreate(
                    [
                        'name' => $data['name'],
                        'population' => $data['population'],
                        'latitude' => $data['latitude'],
                        'longitude' => $data['longitude'],
                        'country_code' => $data['country_code'],
                    ]
                );
            });


    }
}
