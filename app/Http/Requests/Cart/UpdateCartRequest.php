<?php

namespace App\Http\Requests\Cart;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCartRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $product = $this->route('product');

        return [
            'quantity' => [
                'required',
                'integer',
                'min:1',
                Rule::max($product->stock),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'quantity.max' => 'Only ' . $this->route('product')->stock . ' item(s) are currently available in stock.',
        ];
    }
}
