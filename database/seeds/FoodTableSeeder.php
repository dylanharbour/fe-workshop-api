<?php

use Illuminate\Database\Seeder;

class FoodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect(range(1,100))->each(function($page) {
            $json = file_get_contents('http://www.recipepuppy.com/api/?p=' . $page);

            $this->attributesFromJson($json)
                ->each(function($entityAttributes) {
                    \App\Food::firstOrCreate($entityAttributes);
            });
        });
    }


    /**
     * @param string $json
     * @return \Illuminate\Support\Collection
     */
    protected function attributesFromJson(string $json) : \Illuminate\Support\Collection
    {
        $response = json_decode($json,1);

        $attributes = collect($response['results'])->map(function($data) {
            return [
                'title' => $data['title'],
                'link' =>  $data['href'],
                'image' => $data['thumbnail'],
                'ingredients' => $data['ingredients'],
                'description' => $data['ingredients'],
            ];
        });

        return collect($attributes);
    }
}
