<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BranchRequest extends FormRequest
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
            'name' => ['required','string'],
            'address' => ['required','string'],
            'status' => ['required','numeric'],
            'phone_no' => ['required','string']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'address.required' => 'Address is required',
            'status.required' => 'Status is required',
            'phone_no.required' => 'Phone No. is required'
        ];
    }
}
