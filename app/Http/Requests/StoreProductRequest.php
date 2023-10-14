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
            'weight' => 'required|numeric',
            'product_category_id' => 'required',
            // 'rating_id' => 'required',
            // 'color_id' => 'required',
            'short_description' => 'max:255',
            'description' => 'max:255',
        ];
    }
}
