<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
            'name_ar'=>'required',
            'name_en'=>'required',
            'main_image'=>'image|required|mimes:jpeg,png,jpg,gif,svg',
            'description_ar'=>'required',
            'description_en'=>'required',
            'price'=>'required',
            'short_description_ar'=>'required',
            'short_description_en'=>'required',
            'category_id'=>'required',
            // 'available_count'=>'required|min:1',
            'size'=>'required',
        ];
    }
}
