<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookCreateRequest extends FormRequest
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
            // 本情報登録時バリデーションチェック
            'price' => 'max:7|integer',
            'book_name' => 'required|max:100',
            'current_page' => 'required|max:4|integer',
            'total_page' => 'required|max:4|integer'
            // 'purchase_type' =>
        ];
    }

    /**
     * メッセージ設定
     * @return array
     */
    public function messages() {
        return [
            'price.max' => '※値段は7桁以下で入力してください',
            'price.integer' => '※値段は半角数字で入力してください',
            'book_name.required' => '※タイトルは必須項目です',
            'book_name.max' => '※タイトルは100文字以下で入力してください',
            'current_page.required' => '※現ページは必須項目です',
            'current_page.max' => '※現ページは4桁以下で入力してください',
            'current_page.integer' => '※現ページは半角数字で入力してください',
            'total_page.required' => '※総ページは必須項目です',
            'total_page.max' => '※総ページは4桁以下で入力してください',
            'total_page.integer' => '※総ページは半角数字で入力してください'
        ];
    }
}
