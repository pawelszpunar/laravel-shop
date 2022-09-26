<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpsertProductRequest extends FormRequest
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
            'name' => 'required|max:500',
            'description' => 'required|max:1500',
            'amount' => 'required|integer|min:0|max:10000',
            'price' => 'required|numeric|between:0,999999.99',
            'image' => 'nullable|image|mimes:jpg,png',
            'category_id' => 'nullable|min:0'
        ];
    }

    // Overwrite default validation messages - example
//    public function messages()
//    {
//        return [
//            'name.required' => 'You can\'t leave it blank'
//        ];
//    }

    // Overwrite default filed names in validation - example
//    public function attributes()
//    {
//        return [
//            'name' => 'Name of the product'
//        ];
//    }
}
