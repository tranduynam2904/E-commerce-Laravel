<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfirmPasswordRequest extends FormRequest
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
            'new_password' => ['required', 'string', 'min:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z]).+$/'],
            'password_confirm' => 'required|same:new_password',
        ];
    }
    public function messages(): array
    {
        return [
            // :attribute = new_password
            'new_password.regex' => 'The :attribute must contain at least one uppercase and one lowercase letter.'
        ];
    }
}
