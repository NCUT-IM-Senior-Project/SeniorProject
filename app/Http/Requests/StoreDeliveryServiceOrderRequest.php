<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDeliveryServiceOrderRequest extends FormRequest
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
            'keynote' => 'required|string|max:255',
            'car_id' => 'required|string|max:255',
            'driver_id' => 'required|string|max:255',
            'departure_at' => 'required|date',
            'return_at' => 'required|date',
            // Validate delivery orders
            'delivery_orders.*.delivery_order_id' => 'required|string|max:255',
            'delivery_orders.*.sequence' => 'required|string|max:255',
            'delivery_orders.*.plans_details_status_id' => 'required|integer',

        ];
    }
}
