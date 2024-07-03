<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComboRequest extends FormRequest
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
            'id' => 'required|unique:combo,id',
            'ten_combo' => 'required|string|max:255',
            'nha_xuat_ban_id' => 'required|exists:nha_xuat_ban,id',
            'gia' => 'required|numeric|min:0',
            'so_luong' => 'required|integer|min:1',
            'mo_ta' => 'nullable|string',
            'hinh_anh' => 'nullable|image|max:2048', // Max 2MB
        ];
    }
    public function messages()
    {
        return [
            'ten_combo.required' => 'Tên combo là bắt buộc.',
            'nha_xuat_ban_id.required' => 'Nhà xuất bản là bắt buộc.',
            'gia.required' => 'Giá là bắt buộc.',
            'so_luong.required' => 'Số lượng là bắt buộc.',
            'hinh_anh.image' => 'Tệp tải lên phải là hình ảnh.',
            'slug.required' => 'Slug là bắt buộc.',
            'slug.unique' => 'Slug đã tồn tại.',
        ];
    }
}
