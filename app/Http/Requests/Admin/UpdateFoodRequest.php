<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFoodRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' =>  'required|string|max:255|unique:foods,name,' . $this->food->id,
            'description' =>  'nullable|string|max:255',
            'type' => 'required|numeric|max:4',
            'stock' => 'nullable|numeric',
            'price' => 'required|numeric',
            'servingSize' => 'nullable|numeric',
            'calcKcal' => 'nullable|numeric',
            'calcTotFat' => 'nullable|numeric',
            'calcSatFat' => 'nullable|numeric',
            'calcSugar' => 'nullable|numeric',
            'calcSodium' => 'nullable|numeric',
            'grade' => 'nullable|numeric',
            'image' => 'nullable|image|max:2048'
        ];
    }
}
