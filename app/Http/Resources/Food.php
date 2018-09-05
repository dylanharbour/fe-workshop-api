<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Food extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'feeds_count' => $this->feeds_count,
            'price' => $this->price,
            'city' =>
                [
                    'id' => $this->city_id,
                    'name' => $this->city->name ?? '',
                ],
            'link' => $this->link,
            'image' => $this->image,
            'ingredients' => $this->ingredients,
            'description' => $this->description,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
        ];
    }
}
