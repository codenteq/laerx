<?php

namespace App\Http\Requests\Manager;

use Illuminate\Foundation\Http\FormRequest;

class CourseTeacherRequest extends FormRequest
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
        if ($this->course_teacher)
            $id = $this->course_teacher->id;
        return [
            'tc' => 'required|string|min:11|max:11|unique:users,tc,'.$id,
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'address' => 'required|string',
            'languageId' => 'required|numeric',
            'password' => 'confirmed'
        ];
    }

    public function messages()
    {
        return [
            'tc.unique' => 'Bu TCKN kullanılıyor.'
        ];
    }
}
