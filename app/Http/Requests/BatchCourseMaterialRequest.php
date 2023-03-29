<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BatchCourseMaterialRequest extends FormRequest
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
            'batch_id'=>'required',
            'course_material_id'=>'nullable',
            'course_module_id' => 'nullable',
            'admissionId' => 'nullable|array',
            'transferAdmissionId' => 'nullable|array',
        ];
    }

    public function messages()
    {
        return [
            'batch_id.required'=>'Please Select Your Batch',
        ];
    }
}
