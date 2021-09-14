<?php

namespace App\Http\Requests\Teacher;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'address' => 'required|string',
            'password' => 'confirmed',
            'photo' => 'file|mimes:jpeg,jpg,png',
        ];
    }
}
