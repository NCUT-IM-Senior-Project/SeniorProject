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
            'partner_id' => 'required|string|max:255',
            'order_number' => 'required|string|max:255',
            'logistics_id' => 'required|integer',
            'scheduled_at' => 'nullable|string|max:255',
            'shipment_at' => 'nullable|string|max:255',
            'delivery_status_id' => 'nullable|integer',
            'created_by' => 'nullable|integer',
        ];
    }
}
