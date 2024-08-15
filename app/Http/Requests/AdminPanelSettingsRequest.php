<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminPanelSettingsRequest extends FormRequest
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
            'system_name' => 'required|string',
            'address' => 'required',
            'phone' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'system_name.required' => 'اسم الشركة مطلوب',
            'address.string' => 'يجب ادخال العنوان',
            'phone.required' => 'يجب ادخال رقم الهاتف',

        ];
    }
}
