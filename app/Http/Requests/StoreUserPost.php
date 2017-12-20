<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserPost extends FormRequest
{


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'bail|required|unique:users|max:191',
            'email' => 'bail|required|unique:users|max:191',
            'password' => 'bail|required|confirmed|max:6',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '姓名为必填项',
            'name.max' => '姓名最大长度为191',
            'name.unique' => '姓名不能重复',
            'email.required' => '邮箱地址为必填项',
            'email.max' => '邮箱最大长度为191',
            'email.unique' => '邮箱不能重复',
            'password.required' => '密码为必填项',
            'password.confirmed'=>'两次密码不一致！',
        ];
    }
}
