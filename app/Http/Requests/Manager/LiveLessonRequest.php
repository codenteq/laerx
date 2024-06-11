<?php

namespace App\Http\Requests\Manager;

use Illuminate\Foundation\Http\FormRequest;

class LiveLessonRequest extends FormRequest
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
            'title' => 'required|string',
            'live_date' => 'required',
            'url' => 'required|string',
            'periodId' => 'required|numeric',
            'monthId' => 'required|numeric',
            'groupId' => 'required|numeric',
            'typeId' => 'required|numeric',
        ];
    }
}
