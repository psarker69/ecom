<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category_id'=>'required|numeric',
            'product_name'=>'required|string',
            'product_price'=>'required|numeric|min:0',
            'product_code'=>'required|string|unique:products,product_code',
            'product_stock'=>'required|numeric|min:1',
            'alert_quantity'=>'required|numeric|min:1',
            'short_description'=>'nullable|string',
            'long_description'=>'nullable|string',
            'additional_info'=>'nullable|string',
            'product_image'=>'required|image|max:1024',
            'product_multiple_image'=>'nullable|image|max:1024'
        ];
    }
}
