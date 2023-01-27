<?php

namespace App\Http\Requests\Role;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' => ['required','email','unique:users,email'],
            'mobile_no' => ['required','numeric'],
            'address' => ['required','string'],
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'emp_id' => ['nullable','string'],
            'tutor' => ['required','numeric'],
            'remark' => ['nullable','string'],
            'status' => ['required','numeric'],
            'branch_id' => ['required', 'array']
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email address must be unique',
            'name.required' => 'Name is required',
            'image' => 'Image is required',
            'mobile_no.required' => 'Mobile number is required',
            'address.required' => 'Address is required',
            'tutor.required' => 'Tutor status is required',
            'status.required' => 'Status is required',
            'branch_id.required' => 'Branch is required',
        ];
    }
}
