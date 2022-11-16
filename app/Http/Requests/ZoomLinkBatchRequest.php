<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ZoomLinkBatchRequest extends FormRequest
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
            'batch_id'=>['required', 'numeric'],
            'zoom_link_id'=>['required', 'numeric']
        ];
    }

    public function messages()
    {
        return [
            'batch_id.required'=>'Please Select Your Batch',
            'zoom_link_id'=>'Please Select the Zoom Link'
        ];
    }
}
