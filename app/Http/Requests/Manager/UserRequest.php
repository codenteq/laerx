<?php

namespace App\Http\Requests\Manager;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class UserRequest extends FormRequest
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
        if ($this->user)
            $id = $this->user->id;
        return [
            'tc' => 'required|string|min:11|max:11|unique:users,tc,' . $id,
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'password' => 'confirmed',
            'photo' => 'file|mimes:jpeg,jpg,png',
            'phone' => 'required',
            'address' => 'required|string',
            'periodId' => 'required|numeric',
            'monthId' => 'required|numeric',
            'languageId' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'tc.unique' => 'Bu TCKN kullanılıyor.'
        ];
    }
}
