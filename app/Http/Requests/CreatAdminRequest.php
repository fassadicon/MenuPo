<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatAdminRequest extends FormRequest
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
            'email' =>  'required|string|email|max:255|unique:users',
            'recoveryEmail' => 'nullable|string|email|max:255|unique:users',
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'middleName' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'suffix' => 'nullable|string|max:255',
            'sex' => 'required|max:1',
            'birthDate' => 'required|date',
            'image' => 'nullable|image|max:2048'
        ];
    }
}
