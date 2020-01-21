<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'surname' => 'string',
            'country' => 'string',
            'city' => 'string',
            'street' => 'string',
            'items.*.product_id' => 'sometimes|integer',
            'items.*.count' => 'sometimes|integer',
            'items.*.price' => 'sometimes|integer'
        ];
    }
}
