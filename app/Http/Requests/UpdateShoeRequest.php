<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShoeRequest extends FormRequest
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
            'title'=>'required',
            'description'=>'required',
            'price'=>'required|numeric',
            'stock'=>'required|numeric',
            'category_id'=>'required|min:1',
            'model_id'=>'required|min:1',
            'image_url'=>'image|mimes:jpeg,png,jpg,gif',
            'brand_id'=>'required|min:1',

        ];
    }
}
