<?php

namespace App\Http\Requests\Quiz;

use Illuminate\Foundation\Http\FormRequest;

class QuizRequest extends FormRequest
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
            'course_id' => ['required','numeric'],
            'name' => ['required','string'],
            'time_period' => ['required','numeric'],
            'status' => ['required','numeric'],
            'date' => ['required','date'],
            'remark' => ['nullable','string'],
        ];
    }
    public function messages()
    {
        return [
            'course_id.required' => 'Please select the course',
            'name.required' => 'Quiz name is required',
            'time_period.required' => 'Time Period is required',
            'status.required' => 'Status is required for a Course',
            'date.required' => 'Date is required',
        ];
    }
}
