<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TacGiaRequest extends FormRequest
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
            'sach_id' => 'required|string',
            'ten_tac_gia' => 'required|string|max:255',
            'ngay_sinh' => 'required|date',
            'quoc_tich' => 'required|string|max:255',
            'dia_chi' => 'required|string|max:255',
        ];
    }
    public function messages()
    {
        return[
            'sach_id.required' => 'Trường sách ID là bắt buộc.',
            'sach_id.string' => 'Sách ID phải là chuỗi ký tự.',
            'ten_tac_gia.required' => 'Trường tên tác giả là bắt buộc.',
            'ten_tac_gia.string' => 'Tên tác giả phải là chuỗi ký tự.',
            'ten_tac_gia.max' => 'Tên tác giả không được vượt quá 255 ký tự.',
            'ngay_sinh.required' => 'Trường ngày sinh là bắt buộc.',
            'ngay_sinh.date' => 'Ngày sinh phải là ngày hợp lệ.',
            'quoc_tich.required' => 'Trường quốc tịch là bắt buộc.',
            'quoc_tich.string' => 'Quốc tịch phải là chuỗi ký tự.',
            'quoc_tich.max' => 'Quốc tịch không được vượt quá 255 ký tự.',
            'dia_chi.required' => 'Trường địa chỉ là bắt buộc.',
            'dia_chi.string' => 'Địa chỉ phải là chuỗi ký tự.',
            'dia_chi.max' => 'Địa chỉ không được vượt quá 255 ký tự.',
        ];
    }
}
