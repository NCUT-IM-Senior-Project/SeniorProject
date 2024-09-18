<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVendorRequest extends FormRequest
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
            'partner_id' => 'required|string|max:255|unique:vendors,partner_id',
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'land_line' => 'required|string|max:255',
            'fax' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'contactPeopleName' => 'nullable|string|max:255',
            'contactPeoplePhone' => 'nullable|string|max:255',
            'requirement_items_id' => 'required|array', // 修改為數組
            'requirement_items_id.*' => 'exists:requirement_items,id', // 每個項目必須存在於 requirement_items 表中
        ];
    }

}
