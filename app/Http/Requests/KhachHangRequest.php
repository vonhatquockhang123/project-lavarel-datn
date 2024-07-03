<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class KhachHangRequest extends FormRequest
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
        $ten_dang_nhap = $this->route('ten_dang_nhap');
        return [
            'ten_dang_nhap' => [
                'required', 
                'min:6', 
                'max:32', 
                'regex:/^[a-zA-Z][a-zA-Z0-9]*$/u', 
                'not_regex:/[\p{P}\p{M}\p{S}\p{C}\p{Z}]/u', 
                'not_regex:/[^\p{L}\p{N}]/u', 
                Rule::unique('khach_hang', 'ten_dang_nhap')->ignore($ten_dang_nhap, 'ten_dang_nhap') 
            ],
            'ten_khach_hang' => 'required|min:10|max:50|regex:/^[^\d!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]+$/u', 
            'so_dien_thoai' => 'required|regex:/^0\d{9}$/', 
            'email' => [
                'required', 
                'min:15', 
                'max:50', 
                'regex:/^[a-zA-Z0-9._-]+@gmail\.com$/', 
                Rule::unique('khach_hang', 'email')->ignore($ten_dang_nhap, 'ten_dang_nhap') 
            ],
            'dia_chi' => 'required|min:5|max:128|regex:/^[^!@#$%^&*()_+{}\[\]:;<>?~\\/-]+$/u', 
            'anh_dai_dien' => 'image|mimes:jpg,png,jpeg|max:6048' 
        ];
    }
    public function messages(){
        return [
            'ten_dang_nhap.required'=>"Tên đăng nhập không được bỏ trống!",
            'ten_dang_nhap.min'=>"Tên đăng nhập phải lớn hơn :min ký tự!",
            'ten_dang_nhap.max'=>"Tên đăng nhập phải nhỏ hơn :max ký tự!",
            'ten_dang_nhap.regex'=>"Tên đăng nhập không được bắt đầu bằng số, không chứa khoản trắng, không được có dấu và chứa ký tự đặc biệt! ",

            'mat_khau.required'=>"Mật khẩu không được bỏ trống!",
            'mat_khau.min'=>"Mật khẩu phải lớn hơn :min ký tự!",
            'mat_khau.max'=>"Mật khẩu phải nhỏ hơn :max ký tự!",

            'ten_khach_hang.required'=>"Tên khách hàng không được bỏ trống!",
            'ten_khach_hang.min'=>"Tên khách hàng phải lớn hơn :min ký tự",
            'ten_khach_hang.max'=>"Tên khách hàng phải nhỏ hơn :max ký tự",
            'ten_khach_hang.regex'=>"Tên khách hàng không được chứa ký tự là số!",
            
            'so_dien_thoai.required' => 'Số điện thoại không được bỏ trống!',
            'so_dien_thoai.regex' => 'Số điện thoại phải bắt đầu bằng số 0 và có 10 chữ số!',

            'email.required'=>"Email không được bỏ trống!",
            'email.min'=>"Email phải lớn hơn :min ký tự!",
            'email.max'=>"Email phải nhỏ hơn :max ký tự!",
            'email.regex'=>"Không đúng định dạng Email ví dụ:'abc@gmail.com' !",
            'email.unique'=>"Email đã tồn tại!",

            'dia_chi.required'=>"Địa chỉ không được bỏ trống!",
            'dia_chi.min'=>"Địa chỉ phải lớn hơn :min ký tự!",
            'dia_chi.max'=>"Địa chỉ phải nhỏ hơn :max ký tự!",
            'dia_chi.regex' => "Địa chỉ không được chứa ký tự đặc biệt!",
            
            'hinh_anh.image' => 'File hình ảnh không hợp lệ!',
            'hinh_anh.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg!',
            'hinh_anh.max' => 'Hình ảnh không được vượt quá kích thước tối đa 2048KB!',
        ];
    }
}
