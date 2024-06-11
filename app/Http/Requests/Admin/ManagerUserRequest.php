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
        $id = null;
        if ($this->manager_user) {
            $id = $this->manager_user->id;
        }

        return [
            'tc' => 'required|string|min:11|max:11|unique:users,tc,'.$id,
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|email',
            'password' => 'confirmed',
            'address' => 'required|string',
            'languageId' => 'required|numeric',
            'companyId' => 'required|numeric',
            'phone' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'tc.unique' => 'Bu TCKN kullanılıyor.',
        ];
    }
}
