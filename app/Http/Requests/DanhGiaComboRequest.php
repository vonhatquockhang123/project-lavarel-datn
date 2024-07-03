<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DanhGiaComboRequest extends FormRequest
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
            'khach_hang_id' => 'required|exists:users,id', 
            'combo_id' => 'required|exists:combos,id', 
            'danh_gia' => 'required|integer|min:1|max:5', 
            'noi_dung' => 'required|string|max:255', 
        ];
    }
    public function messages(){
        return[
            'khach_hang_id.required' => 'Khách hàng không được để trống.',
            'khach_hang_id.exists' => 'Khách hàng không tồn tại trong hệ thống.',
            'combo_id.required' => 'Combo không được để trống.',
            'combo_id.exists' => 'Combo không tồn tại trong hệ thống.',
            'danh_gia.required' => 'Đánh giá không được để trống.',
            'danh_gia.integer' => 'Đánh giá phải là số nguyên.',
            'danh_gia.min' => 'Đánh giá tối thiểu là :min.',
            'danh_gia.max' => 'Đánh giá tối đa là :max.',
            'noi_dung.required' => 'Nội dung đánh giá không được để trống.',
            'noi_dung.string' => 'Nội dung đánh giá phải là chuỗi.',
            'noi_dung.max' => 'Nội dung đánh giá tối đa :max ký tự.',
        ];
    }
}
