<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation Rules
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:categories,name',
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'status' => [
                'nullable',
                'boolean',
            ],
        ];
    }

    /**
     * Custom Validation Messages
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Please enter a category name.',
            'name.unique' => 'This category already exists.',
            'name.max' => 'The category name must not exceed 255 characters.',

            'image.image' => 'Please upload a valid image.',
            'image.mimes' => 'Only JPG, JPEG, PNG, and WEBP images are allowed.',
            'image.max' => 'The image size must not exceed 2 MB.',

            'status.boolean' => 'Invalid category status.',
        ];
    }

    /**
     * Friendly Attribute Names
     */
    public function attributes(): array
    {
        return [
            'name' => 'category name',
            'image' => 'category image',
            'status' => 'category status',
        ];
    }
}
