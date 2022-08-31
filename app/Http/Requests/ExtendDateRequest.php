<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExtendDateRequest extends FormRequest
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
            'admission_id' => ['required','numeric'],
            'batch_installment_id' => ['required','numeric'],
            'finance_id' => ['required','numeric'],
            'due_date' => ['required','date']
        ];
    }

    public function messages()
    {
        return [
            'admission_id.required' => 'Admission is required',
            'batch_installment_id.required' => 'Batch installment is required',
            'finance_id.required' => 'Fiance is required',
            'due_date.required' => 'Due Date is required'
        ];
    }
}
