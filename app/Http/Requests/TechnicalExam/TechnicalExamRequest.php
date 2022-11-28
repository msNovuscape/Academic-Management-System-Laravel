<?php

namespace App\Http\Requests\TechnicalExam;

use Illuminate\Foundation\Http\FormRequest;

class TechnicalExamRequest extends FormRequest
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
            'date'=>['required', 'date'],
            'course_id'=>['required', 'array'],
            'start_time'=>['required', 'array'],
            'end_time'=>['required', 'array'],
            'branch_id'=>['required', 'array']
        ];
    }

    public function messages()
    {
        return [
            'date.required' => 'Date is required',
            'course_id.required' => 'Course is required',
            'start_time.required' => 'Start time is required',
            'end_time.required' => 'End time is required',
            'branch_id.required' => 'Branch is required',
        ];
    }
}
