<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',

                Rule::unique('users', 'email')
                    ->ignore($this->user()),
            ],

            'avatar' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

        ];
    }

    public function messages(): array
    {
        return [

            'name.required' => 'Your name is required.',

            'name.max' => 'Your name may not be greater than 255 characters.',

            'email.required' => 'Your email address is required.',

            'email.email' => 'Please enter a valid email address.',

            'email.unique' => 'This email address is already in use.',

            'avatar.image' => 'The selected file must be an image.',

            'avatar.mimes' => 'The profile picture must be a JPG, JPEG, PNG, or WEBP image.',

            'avatar.max' => 'The profile picture may not be larger than 2 MB.',

        ];
    }
}
