<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            "name"=>'bail|required',
            "email"=>'required',
//            "number"=>'nullable|date',
            "number"=>'nullable',
            //
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'the name is required',
            'email.required'  => 'email is required',
        ];
    }
}
