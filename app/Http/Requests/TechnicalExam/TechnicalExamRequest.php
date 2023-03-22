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
            'course_ids'=>['required', 'array'],
            'timeslot_ids'=>['required', 'array'],
            'exam_type' => ['required'],
            'status'=>['required'],
            'branch_ids'=>['required_if:exam_type,==,2', 'array']
        ];
    }

    public function messages()
    {
        return [

            'date.required' => 'Date is required',
            'course_ids.required' => 'Course is required',
            'timeslot_ids.required' => 'Timeslot is required',
            'exam_type.required' => 'Exam Type is required',
            'branch_ids.required' => 'Branch is required',
            'status.required' => 'Status is required',

        ];
    }
}
