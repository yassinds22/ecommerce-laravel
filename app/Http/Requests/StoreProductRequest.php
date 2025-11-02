<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => '',
            'description' => '',
            'short_description' => '',
            'quantity' => '',
            'cost_price' => '',
            'purchase_price' => '',
            'old_price' => '',
            'new_price' => '',
            'favorite' => '',
            'brand' => '',
            'is_active' => '',
            'view' => '',
            'image' => '',
            'catgorey_id' => '', // تغيير من parent إلى catgorey_id
            'supplier' => ''
        ];
    }

    // public function messages(): array
    // {
    //     return [
    //         'name.required' => 'حقل الاسم مطلوب.',
    //         'name.string' => 'يجب أن يكون الاسم نصاً.',
    //         'name.max' => 'الاسم لا يمكن أن يتجاوز 255 حرفاً.',

    //         'description.required' => 'حقل الوصف مطلوب.',
    //         'description.string' => 'الوصف يجب أن يكون نصاً.',

    //         'short_description.string' => 'الوصف القصير يجب أن يكون نصاً.',
    //         'short_description.max' => 'الوصف القصير لا يمكن أن يتجاوز 255 حرفاً.',

    //         'quantity.required' => 'حقل الكمية مطلوب.',
    //         'quantity.numeric' => 'الكمية يجب أن تكون رقم.',
    //         'quantity.min' => 'الكمية يجب أن تكون على الأقل 0.',

    //         'cost_price.required' => 'حقل سعر التكلفة مطلوب.',
    //         'cost_price.numeric' => 'سعر التكلفة يجب أن يكون رقم.',
    //         'cost_price.min' => 'سعر التكلفة يجب أن يكون على الأقل 0.',

    //         'purchase_price.required' => 'حقل سعر الشراء مطلوب.',
    //         'purchase_price.numeric' => 'سعر الشراء يجب أن يكون رقم.',
    //         'purchase_price.min' => 'سعر الشراء يجب أن يكون على الأقل 0.',

    //         'old_price.numeric' => 'السعر القديم يجب أن يكون رقم.',
    //         'old_price.min' => 'السعر القديم يجب أن يكون على الأقل 0.',
    //         'new_price.numeric' => 'السعر الجديد يجب أن يكون رقم.',
    //         'new_price.min' => 'السعر الجديد يجب أن يكون على الأقل 0.',

    //         'favorite.boolean' => 'حقل المفضلة يجب أن يكون صحيح أو خطأ.',
    //         'is_active.boolean' => 'حقل التفعيل يجب أن يكون صحيح أو خطأ.',
    //         'view.numeric' => 'حقل المشاهدات يجب أن يكون رقم.',

    //         'brand.required' => 'حقل العلامة التجارية مطلوب.',
    //         'brand.string' => 'العلامة التجارية يجب أن تكون نصاً.',
    //         'brand.max' => 'العلامة التجارية لا يمكن أن تتجاوز 255 حرفاً.',

    //         'image.required' => 'حقل الصورة مطلوب.',
    //         'image.image' => 'يجب أن تكون الصورة ملف صورة صالح.',
    //         'image.mimes' => 'يجب أن تكون الصورة من نوع: jpeg, png, jpg, gif.',
    //         'image.max' => 'حجم الصورة لا يمكن أن يتجاوز 2MB.',

    //         'catgorey_id.required' => 'حقل الفئة مطلوب.',
    //         'catgorey_id.exists' => 'الفئة المختارة غير موجودة.',

    //         'supplier.array' => 'الموردين يجب أن يكونوا مصفوفة.',
    //     ];
    // }
}