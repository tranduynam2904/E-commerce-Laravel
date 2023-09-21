<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class StoreEmployeeRequest extends FormRequest
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
            'avatar' => 'image',
            'name' => 'required|min:3|max:255',
            'email' => ['required', 'email', 'unique:employee', 'regex:/@gmail.com$/'],
            'age' => 'required|max:100',
            'gender' => 'required',
            'phone' => 'required',
            'occupation' => 'required',
        ];
    }
}
