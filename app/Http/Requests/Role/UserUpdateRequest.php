<?php

namespace App\Http\Requests\Role;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
        $user = User::findOrFail(request()->id);
        return [
            'name' => ['required','string'],
            'email' => ['required','email','unique:users,email,'.$user->id],
            'mobile_no' => ['required','numeric'],
            'address' => ['required','string'],
            'image' => 'sometimes|nullable|image|mimes:jpeg,png,jpg',
            'emp_id' => ['nullable','string'],
            'tutor' => ['required','numeric'],
            'remark' => ['nullable','string'],
            'status' => ['required','numeric'],
            'status.required' => 'Status is required',
            'branch_id' => ['required', 'array']
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email address must be unique',
            'name.required' => 'Name is required',
            'mobile_no.required' => 'Mobile number is required',
            'address.required' => 'Address is required',
            'tutor.required' => 'Tutor status is required',
            'branch_id.required' => 'Branch is required',
        ];
    }
}
