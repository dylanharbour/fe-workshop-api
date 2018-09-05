<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FoodSearchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'city_id' => 'sometimes|exists:cities,id|nullable',
            'feeds_count' => 'sometimes|nullable|gte:1|lte:6',
            'price_min' => 'sometimes|nullable|gte:10|lte:150',
            'price_max' => 'sometimes|nullable|gte:10|lte:150',
        ];
    }
}
