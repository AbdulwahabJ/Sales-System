<?php

namespace App\Http\Requests\Treasuries;

use Illuminate\Foundation\Http\FormRequest;

class StoreTreasuryRequest extends FormRequest
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
            'name' => 'required|max:255',
            'is_master' => 'required|boolean',
            'last_isal_exhcange' => 'required|integer|min:0',
            'last_isal_collect' => 'required|integer|min:0',
            'active' => 'required|boolean',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'اسم الخزنة مطلوب',
            'is_master.required' => 'الرجاء اختيار نوع الخزنة',
            'last_isal_exhcange.required' => 'الرجاء ادخال رقم الصرف',
            'last_isal_exhcange.integer' => 'الرجاء ادخال رقم صحيح وليس عشري ',
            'last_isal_collect.required' => 'الرجاء ادخال رقم التحصيل',
            'last_isal_collect.integer' => 'الرجاء ادخال رقم صحيح وليس عشري ',
            'active.required' => 'الرجاء ادخال حالة الخزنة',

        ];
    }
}
