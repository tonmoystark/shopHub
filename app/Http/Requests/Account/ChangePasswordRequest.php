<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'current_password' => [
                'required',
                'current_password',
            ],

            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],

        ];
    }

    public function messages(): array
    {
        return [

            'current_password.required' =>
            'Please enter your current password.',

            'current_password.current_password' =>
            'The current password is incorrect.',

            'password.required' =>
            'Please enter a new password.',

            'password.min' =>
            'The new password must be at least 8 characters.',

            'password.confirmed' =>
            'The password confirmation does not match.',

        ];
    }
}
