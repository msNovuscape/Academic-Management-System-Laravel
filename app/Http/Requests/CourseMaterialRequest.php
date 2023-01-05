<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseMaterialRequest extends FormRequest
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
            'course_id'=>['required','numeric'],
            'name'=>['required','string'],
            'type'=>['required','numeric'],
            'status'=>['required','numeric'],
            'link'=>['required'],
            'description'=>['nullable','string'],
            'course_module_id'=>['nullable','numeric'],
        ];
    }

    public function messages()
    {
        return [
            'course_id.required' => 'Course is required',
            'name.required' => 'Name is required',
            'type.required' => 'Type is required',
            'status.required' => 'Status is required',
            'link.required' => 'Link is required'
        ];
    }
}
