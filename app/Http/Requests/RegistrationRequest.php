<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'username' => 'required|min:5|max:15',
            'email' => 'required|unique:users,email|regex:/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/',
            'password' => 'required|min:8',
        ];
    }

    public function messages(): array
    {
        return [
            'email.unique' => 'The email has already been taken. <a href="/login">Login</a>',
            'email.regex' => 'Incorrect email format',
        ];
    }
}
