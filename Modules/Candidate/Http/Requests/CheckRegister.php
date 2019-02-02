<?php

namespace Modules\Candidate\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckRegister extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|string|email|min:10|max:30|unique:candidates',
            'name'  => 'required|string',
            'password'  => 'required|min:6|max:20',
            'phone'  => 'required|min:10|max:11|unique:candidates',
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'email.required' => 'Bạn chưa nhập email',
    //         'name.required' => 'Bạn chưa nhập tên tài khoản',
    //         'password.required' => 'Bạn chưa nhập mật khẩu',
    //         'phone.required' => 'Bạn chưa nhập số điện thoại',
    //         'email.string' => 'Email phải là một chuỗi kí tự',
    //         'name.string' => 'Tên phải là một chuỗi kí tự',
    //         'email.email' => 'Bạn chưa nhập đúng định dạng email',
    //         'email.min' => 'Độ dài email tối thiểu là 10 kí tự',
    //         'password.min' => 'Độ dài password tối thiểu là 6 kí tự',
    //         'phone.min' => 'Độ dài số điện thoại tối thiểu là 10 kí tự',
    //         'email.max' => 'Độ dài email tối đa là 30 kí tự',
    //         'password.max' => 'Độ dài password tối đa là 20 kí tự',
    //         'phone.max' => 'Độ dài số điện thoại tối đa là 11 kí tự',
    //         'email.unique' => 'Email đã tồn tại',
    //         'phone.unique' => 'Số điện thoại đã tồn tại',
    //     ];
    // }
    
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
