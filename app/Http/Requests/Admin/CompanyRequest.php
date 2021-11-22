<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'title' => 'required',
            'subdomain' => 'required',
            'tax_no' => 'required|string|min:11|max:11',
            'email' => 'required|email',
            'phone' => 'required',
            'countryId' => 'required|numeric',
            'cityId' => 'required|numeric',
            'stateId' => 'required|numeric',
            'address' => 'required|string',
            'zip_code' => 'required',
            'packageId' => 'required|numeric',
            'website_url' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date'
        ];
    }
}
