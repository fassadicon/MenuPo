<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
            // 'parent_id' =>  'required|string|max:255|exists:parents,id',
            'parent' =>  'required|string|max:255',
            'LRN' => 'required|numeric',
            'grade' => 'required|numeric|max:6',
            'section' => 'required|string|max:255',
            'adviser' => 'required|string|max:255',
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'middleName' => 'nullable|string|max:255',
            'suffix' => 'nullable|string|max:255',
            'sex' => 'required|max:1',
            'birthDate' => 'required|date',
            'height' => 'nullable|numeric',
            'weight' => 'nullable|numeric',
            'image' => 'nullable|image|max:2048'
        ];
    }
}
