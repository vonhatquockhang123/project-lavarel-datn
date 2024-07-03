<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhieuNhapHangRequest extends FormRequest
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
            'nha_xuat_ban_id' => 'required|string',
            //|exists:nha_xuat_ban,id
            //exists:admin,id
            'tong_tien' => 'required|numeric',
            'ghi_chu' => 'nullable|string',
            'trang_thai' => 'required|boolean',
        ];
    }
    public function messages()
    {
        return[
            'nha_xuat_ban_id.required' => 'Vui lòng nhập nhà xuất bản ID',
            'tong_tien.required' => 'Vui lòng nhập tổng tiền',
            'tong_tien.numeric' => 'Tổng tiền phải là một số',
            'ghi_chu.string' => 'Ghi chú phải là một chuỗi ký tự',
            'trang_thai.required' => 'Vui lòng chọn trạng thái',
            'trang_thai.boolean' => 'Trạng thái phải là đúng hoặc sai',
        ];
    }
}
