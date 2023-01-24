<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BatchRequest extends FormRequest
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
            'name' => ['nullable','string'],
            'time_slot_id' => ['required','numeric'],
            'start_date' => ['required','date'],
            'end_date' => ['required','date'],
            'status' => ['required','numeric'],
            'fee' => ['required','numeric'],
            'remark' => ['nullable','string'],
            'installment_type' => ['required','array'],
            'due_date' => ['required','array'],
            'amount' => ['required','array'],
            'name_other' => ['required','string'],
        ];
    }

    public function messages()
    {
        return [
            'time_slot_id.required' => 'Time Slot is required for a Course',
            'start_date.required' => 'Start Date is required for a Course',
            'end_date.required' => 'End Date Date is required for a Course',
            'status.required' => 'Status is required for a Course',
            'fee.required' => 'Fee is required for a Course',
            'installment_type.required' => 'Installment is required for a Course',
            'due_date.required' => 'Due date for installment is required',
            'amount.required' => 'Amount for installment is required',
            'name_other.required' => 'Batch Name is required',
        ];
    }
}
