<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FiscalYearRequest extends FormRequest
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
            'name' =>['required','string'],
            'start_date' => ['required','date'],
            'end_date' => ['required','date'],
            'status' => ['required','numeric'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Fiscal Year Name is required',
            'start_date.required' => 'Start Date is required',
            'end_date.required' => 'End Date is required',
            'status.required' => 'The status  is required',
        ];
    }
}
