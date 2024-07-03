<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NhaXuatBanRequest extends FormRequest
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
        $id = $this->route('id');
        return [
            'ten_nha_xuat_ban' => 'required|string|max:255',
            'so_dien_thoai' => 'required|regex:/^0\d{9}$/',
            'email' => 'required|email|max:255|unique:nha_xuat_ban,email,' . $id,
            'dia_chi' => 'required|string|max:255',
            'mo_ta' => 'nullable|string',
        ];
    }
    public function messages(){
        return[
            'ten_nha_xuat_ban.required' => 'Tên nhà xuất bản không được bỏ trống!',
            'ten_nha_xuat_ban.string' => 'Tên nhà xuất bản phải là một chuỗi ký tự!',
            'ten_nha_xuat_ban.max' => 'Tên nhà xuất bản không được vượt quá 255 ký tự!',
            
            'so_dien_thoai.required' => 'Số điện thoại không được bỏ trống!',
            'so_dien_thoai.regex' => 'Số điện thoại phải bắt đầu bằng số 0 và có 10 chữ số!',

            'email.required' => 'Email không được bỏ trống!',
            'email.email' => 'Email phải là một địa chỉ email hợp lệ!',
            'email.max' => 'Email không được vượt quá 255 ký tự!',
            'email.unique' => 'Email đã tồn tại!',

            'dia_chi.required' => 'Địa chỉ không được bỏ trống!',
            'dia_chi.string' => 'Địa chỉ phải là một chuỗi ký tự!',
            'dia_chi.max' => 'Địa chỉ không được vượt quá 255 ký tự!',

            'mo_ta.string' => 'Mô tả phải là một chuỗi ký tự!',
        ];
    }
}
