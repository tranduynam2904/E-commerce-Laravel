<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'image' => 'image',
            'second_image' => 'image',
            'name' => 'required',
            'status' => 'required',
            'price' =>  'required|numeric',
            'slug' => 'required',
            'discount_price' => 'required|numeric',
            // 'weight' => 'required',
            'product_category_id' => 'required',
            // 'rating_id' => 'required',
            // 'color_id' => 'required',
            'qty' => 'required|integer|min:0',
            'short_description' => 'max:255',
            'description' => 'max:10000',
        ];
    }
}
