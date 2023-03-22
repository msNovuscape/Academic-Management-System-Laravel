<?php

namespace App\Http\Requests\TechnicalExam;

use Illuminate\Foundation\Http\FormRequest;

class TechnicalExamTimeslotRequest extends FormRequest
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
            'start_time' => ['required'],
            'end_time' => ['required'],
            'status' =>['required']
        ];
    }

    public function messages(){
        return [
          'start_time.required' => 'Start Time is required',
          'end_time.required' => 'End Time is required',
          'status.required' => 'The Status is required',
        ];
    }
}
