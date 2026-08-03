<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'category_id' => ['required', 'exists:categories,id'],

            'name' => ['required', 'string', 'max:255'],

            Rule::unique('products', 'sku')->ignore($this->route('product')),

            'description' => ['nullable', 'string'],

            'price' => ['required', 'numeric', 'min:0'],

            'sale_price' => [
                'nullable',
                'numeric',
                'min:0',
                'lte:price',
            ],

            'stock' => ['required', 'integer', 'min:0'],

            'status' => ['nullable', 'boolean'],

            'is_featured' => ['nullable', 'boolean'],

            'images' => ['required', 'array', 'min:1'],

            'images.*' => [
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

        ];
    }

    public function messages(): array
    {
        return [

            'category_id.required' => 'Please select a category.',

            'category_id.exists' => 'Selected category does not exist.',

            'name.required' => 'Product name is required.',

            'sku.required' => 'SKU is required.',

            'sku.unique' => 'This SKU already exists.',

            'price.required' => 'Price is required.',

            'sale_price.lte' => 'Sale price cannot be greater than the regular price.',

            'stock.required' => 'Stock quantity is required.',

            'images.required' => 'Please upload at least one product image.',

            'images.*.image' => 'Each uploaded file must be an image.',

        ];
    }
}
