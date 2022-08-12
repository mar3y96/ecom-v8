<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'content'=>'required',
        ];

    }
    public function messages()
    {
        return [
            'name.required' => 'first name is required',
            'email.required' => 'email is required',
            'subject.required' => 'subject is required',
            'content.required' => 'content is required',
        ];
    }
}
