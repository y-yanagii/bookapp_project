<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            // ログイン名とパスワードは必須項目とする
            'name' => 'required|unique:users,name|max:255',
            'password' => 'required|min:4'
        ];
    }

    /**
     * メッセージ設定
     * @return array
     */
    public function messages() {
        return [
            'name.required' => '※ログイン名を入力してください',
            'name.unique' => '※入力したユーザ名はすでに使用されています',
            'name.max' => 'ログイン名は255文字以下で入力してください',
            'password.required' => '※パスワードを入力してください',
            'password.min' => '※パスワードは４桁以上入力してください'
        ];
    }
}
