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
            'email' => 'required|email',
            'name' => 'required',
            'subject' => 'required',
            'comment' => 'required',
        ];
    }
    
    public function attributes()
    {
      return [
        'email' => 'メールアドレス',
        'name' => 'お名前',
        'subject' => '件名',
        'comment' => 'お問い合わせ内容',
      ];
    }
}
