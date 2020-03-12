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
        // 本情報登録時バリデーションチェック
        return [
            'book_file' => 'image',
            'price' => 'regex:/^[0-9]+$/|max:7',
            'book_name' => 'required|max:100',
            'current_page' => 'required|regex:/^[0-9]+$/|max:4',
            'total_page' => 'required|regex:/^[0-9]+$/|max:4',
            'purchase_type' => 'required|max:1',
        ];
    }

    /**
     * メッセージ設定
     * @return array
     */
    public function messages() {
        return [
            'book_file.image' => '※ファイルの拡張子はjpg、png、bmp、gif、svgのみ許容します',
            'price.regex' => '※値段は半角数字で入力してください',
            'price.max' => '※値段は7桁以下で入力してください',
            'book_name.required' => '※タイトルは必須項目です',
            'book_name.max' => '※タイトルは100文字以下で入力してください',
            'current_page.required' => '※現ページは必須項目です',
            'current_page.max' => '※現ページは4桁以下で入力してください',
            'current_page.regex' => '※現ページは半角数字で入力してください',
            'total_page.required' => '※総ページは必須項目です',
            'total_page.max' => '※総ページは4桁以下で入力してください',
            'total_page.regex' => '※総ページは半角数字で入力してください',
            'purchase_type.required' => '※購入区分は必須項目です'
        ];
    }
}
