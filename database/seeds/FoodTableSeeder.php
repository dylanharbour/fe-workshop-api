<?php

use Illuminate\Database\Seeder;

class FoodTableSeeder extends Seeder
{

    /**
     * @var \Faker\Generator
     */
    protected $generator;

    /**
     * FoodTableSeeder constructor.
     * @param \Faker\Generator $generator
     */
    public function __construct(Faker\Generator $generator)
    {
        $this->generator = $generator;
    }

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
                'description' => $this->generator->realText(),
                'city_id' => \App\City::inRandomOrder()->first()->id,
                'feeds_count' => rand(1,6),
                'price' => rand(10,150),
            ];
        });

        return collect($attributes);
    }
}
