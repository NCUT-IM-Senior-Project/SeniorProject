<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDeliveryOrderRequest extends FormRequest
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
            'partner_id' => 'required|string|regex:/^[A-Z]\d{4}$/',
            'order_number' => 'required|string|max:255',
            'logistics_id' => 'required|integer',
            'scheduled_at' => 'date',
            'shipment_at' => 'date',
            'delivery_status_id' => 'integer',
        ];
    }
}
