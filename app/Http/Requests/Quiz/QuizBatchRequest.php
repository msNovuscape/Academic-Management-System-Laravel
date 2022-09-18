<?php

namespace App\Http\Requests\Quiz;

use Illuminate\Foundation\Http\FormRequest;

class QuizBatchRequest extends FormRequest
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
            'batch_id' => ['required','numeric'],
            'quiz_id' => ['required','numeric'],
            'status' => ['required','numeric'],
        ];
    }

    public function messages()
    {
        return [
            'batch_id.required' => 'Batch is required',
            'quiz_id.required' => 'Quiz is required',
            'status.required' => 'Status is required',
        ];
    }
}
