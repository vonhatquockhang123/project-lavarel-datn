<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoaiSachRequest extends FormRequest
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
            'ten_loai_sach' => [
                'required',
                'min:3',  // Thay số 3 bằng số ký tự tối thiểu bạn mong muốn
                'max:255', // Thay số 255 bằng số ký tự tối đa bạn mong muốn
                'regex:/^[^\d\s_][\p{L}\p{N}\s_]+$/u',
            ],
        ];
    }
    public function messages(){
        return[
            'ten_loai_sach.required'=>'Tên loại sách không được bỏ trống!',
            'ten_loai_sach.min'=>'Tên loại sách phải lớn hơn :min ký tự!',
            'ten_loai_sach.max'=>'Tên loại sách phải nhỏ hơn :max ký tự!',
            'ten_loai_sach.regex'=>'Tên loại sách không được bắt đầu bằng số và không có ký tự đặc biệt!',
        ];
    }

}
