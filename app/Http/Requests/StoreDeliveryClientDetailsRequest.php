<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDeliveryClientDetailsRequest extends FormRequest
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
            'delivery_order_id' => 'required|array',
            'delivery_order_id.*' => 'required|exists:delivery_orders,id',
            'name' => 'required|array',
            'name.*' => 'required|string|max:255',
            'specification' => 'required|array',
            'specification.*' => 'required|string|max:255',
            'quantity' => 'required|array',
            'quantity.*' => 'required|integer|min:1',
            'weight' => 'required|array',
            'weight.*' => 'required|numeric|min:0',
            'description' => 'nullable|array',
            'description.*' => 'nullable|string|max:255',
        ];
    }
}
