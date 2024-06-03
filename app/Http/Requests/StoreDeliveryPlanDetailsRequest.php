<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDeliveryPlanDetailsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'delivery_orders.*.delivery_order_id' => 'required|string|max:255',
            'delivery_orders.*.sequence' => 'required|string|max:255',
            'delivery_orders.*.plans_details_status_id' => 'required|integer',
        ];
    }
}
