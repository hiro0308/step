<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
            'comment' => 'required|max:255',
        ];
    }
    
    public function messages()
    {
      return [
        'comment.required' => '入力必須です。',
        'comment.max' => '255文字以内で入力して下さい。'
      ];
    }
    
    public function attributes()
    {
      return [
        'comment' => 'メッセージ',
      ];
    }
}
