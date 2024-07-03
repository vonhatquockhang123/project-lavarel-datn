<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoiMatKhauRequest extends FormRequest
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
            'mat_khau' => 'required|string',
            'mat_khau_moi' => 'required|string|min:8|max:32|confirmed',
        ];
    }
    public function messages()
    {
        return [
            'mat_khau.required' => 'Mật khẩu cũ là bắt buộc.',
            'mat_khau_moi.required' => 'Mật khẩu mới là bắt buộc.',
            'mat_khau_moi.string' => 'Mật khẩu mới phải là chuỗi ký tự.',
            'mat_khau_moi.min' => 'Mật khẩu mới phải có ít nhất 8 ký tự.',
            'mat_khau_moi.max' => 'Mật khẩu mới không được vượt quá 32 ký tự.',
            'mat_khau_moi.confirmed' => 'Xác nhận mật khẩu mới không khớp.',
        ];
    }
}
