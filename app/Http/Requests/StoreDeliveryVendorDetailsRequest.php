<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDeliveryVendorDetailsRequest extends FormRequest
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
            'delivery_order_id'=> 'required|integer|max:255',
            'specification' => 'nullable|string|max:255',
            'quantity' => 'required|integer|min:1 ,max:99', // 確保正整數
            'main_color	' => 'nullable|string|max:255',
            'work_number' => 'nullable|integer|max:255',
            'description' => 'nullable|string|max:255',
        ];
    }
}
