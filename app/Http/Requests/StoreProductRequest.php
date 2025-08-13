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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'quantity' => 'required|numeric|max:255',
            'cost_price' => 'required|numeric',
            'purchase_price' => 'required|numeric|max:255',
             'brand' => 'required|string|max:255',
             'parent' => '',
             'supplier' => ''
            //
        ];
    }
}
