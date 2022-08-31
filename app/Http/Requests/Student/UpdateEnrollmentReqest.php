<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEnrollmentReqest extends FormRequest
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
        $req = request()->all();
        $user_id = $req['id'];
        return [
            'name' => ['required','string'],
            'email' => ['required','email','unique:users,email,'.$user_id],
            'country_of_birth' => ['required','numeric'],
            'country_of_living' => ['required','numeric'],
            'gender' => ['required','numeric'],
            'dob' => ['required','date'],
            'mobile_no' => ['required','numeric'],
            'residential_address' => ['required','string'],
            'state' => ['required','string'],
            'post_code' => ['required','numeric'],
            'commencement_date' => ['required','date'],
            'is_aus_permanent_resident' => ['required','numeric'],
            'is_living_in_aus' => ['required','numeric'],
            'visa_type' => ['required','string'],
            'passport_number' => ['required','string'],
            'passport_expiry_date' => ['required','date'],
            'e_contact_name' => ['required','string'],
            'relation' => ['required','string'],
            'e_contact_no' => ['required','numeric'],
            'image' => ['nullable','image','mimes:jpg,png,jpeg'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'country_of_birth.required' => 'The country of Birth is required',
            'country_of_living.required' => 'The country of Living is required',
            'gender.required' => 'Gender is required',
            'dob.required' => 'Date of Birth is required',
            'mobile_no.required' => 'Mobile No. is required',
            'residential_address.required' => 'Residential address is required',
            'state.required' => 'State is required',
            'post_code.required' => 'Post code is required',
            'commencement_date.required' => 'commencement Date is required',
            'is_aus_permanent_resident.required' => 'Permanent Resident is required',
            'is_living_in_aus.required' => 'Living in Australia is required',
            'passport_number.required' => 'Passport Number is required',
            'passport_expiry_date.required' => 'Passport Expiry Date is required',
            'e_contact_name.required' => 'Emergency Contact Name is required',
            'relation.required' => 'Relation is required',
            'e_contact_no.required' => 'Emergency contact No. is required',
            'term_and_condition.required' => 'Term and Condition  is required',
            'privacy.required' => 'Privacy is required',
            'signature.required' => 'Signature is required',
        ];
    }
}
