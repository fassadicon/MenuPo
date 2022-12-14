<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateParentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->user()->role == 1 || $this->user()->role == 2)
            return true;
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        if (auth()->user()->role == 2) {
            return [
                'email' => 'required|email|max:255|unique:users,email,' . $this->guardian->user->id,
                'recoveryEmail' => 'nullable|email|max:255|unique:users,recoveryEmail,' . $this->guardian->user->id,
                'firstName' => 'required|string|max:255',
                'lastName' => 'required|string|max:255',
                'middleName' => 'nullable|string|max:255',
                'address' => 'nullable|string|max:255',
                'suffix' => 'nullable|string|max:255',
                'sex' => 'required|max:1',
                'birthDate' => 'required|date',
                'image' => 'nullable|image|max:2048'
            ];
        } else {
            return [
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
}
