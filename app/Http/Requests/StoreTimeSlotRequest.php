<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTimeSlotRequest extends FormRequest
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
            'time_table_id' => ['required','numeric'],
            'status' =>['required','numeric'],
            'branch_id' =>['required','numeric']
        ];
    }
    public function messages(){
        return [
            'course_id.required' =>'Course is required',
            'time_table_id.required' => 'Time Table is required',
            'status.required' => 'The Status is required',
            'branch_id.required'=>'Branch id is required'
        ];
    }


}
