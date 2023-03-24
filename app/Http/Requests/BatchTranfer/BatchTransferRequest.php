<?php

namespace App\Http\Requests\BatchTranfer;

use Illuminate\Foundation\Http\FormRequest;

class BatchTransferRequest extends FormRequest
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
            'transfer_batch_id'=>['required', 'numeric', 'exists:batches,id'],
            'admissionId' => 'nullable|array',
            'admissionId.*' => 'exists:admissions,id',
        ];
    }

    public function messages()
    {
        return [
            'transfer_batch_id.required' => 'Role Name is required',
        ];
    }
}
