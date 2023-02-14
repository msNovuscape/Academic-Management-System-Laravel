<?php

namespace App\Http\Requests\Quiz;

use Illuminate\Foundation\Http\FormRequest;

class QuizIndiviualRequest extends FormRequest
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
            'quiz_id' => ['required','numeric'],
            'status' => ['required','numeric'],
            'no_of_attempt' => ['required','numeric'],
        ];
    }

    public function messages()
    {
        return [
            'admission_id.required' => 'Admission Name is required',
            'quiz_id.required' => 'Quiz is required',
            'status.required' => 'Status is required',
        ];
    }
}
