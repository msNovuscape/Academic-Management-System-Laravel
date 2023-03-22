<?php

namespace App\Http\Requests\TechnicalExam;

use Illuminate\Foundation\Http\FormRequest;

class TechnicalExamLocationRequest extends FormRequest
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
            'city_name'=>['required'],
            'address'=>['required'],
            'status'=>['required'],
        ];
    }

    public function messages()
    {
        return [
            'city_name.required' => 'City Name is required',
            'address.required' => 'Full Address is required',
            'status.required' => 'Status is required',
        ];
    }
}
