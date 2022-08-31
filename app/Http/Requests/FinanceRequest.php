<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FinanceRequest extends FormRequest
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
            'amount' => ['required','numeric'],
            'date' => ['required','date'],
            'payment_status' => ['required','numeric'],
            'bank_status' => ['required','numeric'],
            'transaction_no' => ['nullable','string'],
            'remark' => ['nullable','string'],
        ];
    }

    public function messages()
    {
        return [
            'amount.required' => 'Amount is required',
            'date.required' => 'Date is required',
            'payment_status.required' => 'Payment Status is required',
            'bank_status.required' => 'Bank Status  is required',
        ];
    }
}
