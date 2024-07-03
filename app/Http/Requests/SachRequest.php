<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SachRequest extends FormRequest
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
            'loai_sach_id' => 'required|string',
            'nha_xuat_ban_id' => 'required|string',
            'ten_sach' => 'required|string|max:255',
            'kich_co' => 'required|string|max:255',
            'can_nang' => 'required|numeric',
            'so_trang' => 'required|integer',
            'ngon_ngu' => 'required|string|max:50',
            'ngay_phat_hanh' => 'required|date',
            'gia' => 'required|numeric',
            'gia_sach_dien_tu' => 'nullable|numeric',
            'so_luong' => 'required|integer',
            'mo_ta' => 'nullable|string',
            'danh_gia' => 'nullable|string|max:255',
            'slug' => 'required|string|max:255|unique:sach,slug,' . $this->route('id'),
        ];
    }
    
    public function messages():array {
        return[
            'loai_sach_id.required' => 'Vui lòng nhập loại sách.',
            'nha_xuat_ban_id.required' => 'Vui lòng nhập nhà xuất bản.',
            'ten_sach.required' => 'Vui lòng nhập tên sách.',
            'ten_sach.max' => 'Tên sách không được vượt quá :max ký tự.',
            'kich_co.required' => 'Vui lòng nhập kích cỡ sách.',
            'kich_co.max' => 'Kích cỡ sách không được vượt quá :max ký tự.',
            'can_nang.required' => 'Vui lòng nhập cân nặng.',
            'can_nang.numeric' => 'Cân nặng phải là số.',
            'so_trang.required' => 'Vui lòng nhập số trang.',
            'so_trang.integer' => 'Số trang phải là số nguyên.',
            'ngon_ngu.required' => 'Vui lòng nhập ngôn ngữ.',
            'ngon_ngu.max' => 'Ngôn ngữ không được vượt quá :max ký tự.',
            'ngay_phat_hanh.required' => 'Vui lòng chọn ngày phát hành.',
            'ngay_phat_hanh.date' => 'Ngày phát hành không hợp lệ.',
            'gia.required' => 'Vui lòng nhập giá sách.',
            'gia.numeric' => 'Giá sách phải là số.',
            'gia_sach_dien_tu.numeric' => 'Giá sách điện tử phải là số.',
            'so_luong.required' => 'Vui lòng nhập số lượng sách.',
            'so_luong.integer' => 'Số lượng sách phải là số nguyên.',
            'slug.required' => 'Vui lòng nhập slug.',
            'slug.max' => 'Slug không được vượt quá :max ký tự.',
            'slug.unique' => 'Slug đã tồn tại.',
        ];
    }
}
