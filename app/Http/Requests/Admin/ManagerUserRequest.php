<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ManagerUserRequest extends FormRequest
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
            'tc' => 'required',
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'address' => 'required',
            'languageId' => 'required',
            'companyId' => 'required',
            'phone' => 'required',
        ];
    }
}
