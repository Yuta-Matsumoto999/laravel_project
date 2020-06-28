<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
          'title' => "required|integer|max: 50",
          'content' => "required|string|max: 1000"
        ];
    }

    /**
     * custom message
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => '必須の項目です',
            'string' => '文字列以外は入力できません',
            'integer' => '数字のみで入力してください',
            'max' => "最大文字数は:max文字です"
        ];
    }
}
