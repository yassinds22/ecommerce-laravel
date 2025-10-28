<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'number' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            'cantry' => 'nullable|string|max:100',
            'city' => 'nullable|string|max:100',
            'street' => 'nullable|string|max:255',
            
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'الاسم مطلوب.',
            'name.string' => 'الاسم يجب أن يكون نصًا.',
            'name.max' => 'الاسم لا يمكن أن يتجاوز 255 حرفًا.',

            'email.required' => 'البريد الإلكتروني مطلوب.',
            'email.email' => 'يجب إدخال بريد إلكتروني صالح.',
            'email.unique' => 'البريد الإلكتروني مستخدم من قبل.',

            'password.required' => 'كلمة المرور مطلوبة.',
            'password.min' => 'كلمة المرور يجب أن تكون 6 أحرف على الأقل.',
            'password.confirmed' => 'تأكيد كلمة المرور لا يطابق.',

            'number.max' => 'رقم الهاتف لا يمكن أن يتجاوز 20 رقمًا.',
            'address.max' => 'العنوان لا يمكن أن يتجاوز 500 حرف.',
            'cantry.max' => 'اسم الدولة لا يمكن أن يتجاوز 100 حرف.',
            'city.max' => 'اسم المدينة لا يمكن أن يتجاوز 100 حرف.',
            'street.max' => 'اسم الشارع لا يمكن أن يتجاوز 255 حرف.',

           
        ];
    }
}
