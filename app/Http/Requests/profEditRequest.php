<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


class profEditRequest extends FormRequest
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
            'email' => [
              'required',
              Rule::unique('users')->ignore(Auth::id())->whereNull('deleted_at'),
            ],
            'username' => 'max:50',
            'comment' => 'max:500',
            'pic' => 'file|image|mimes:png,jpeg,jpg,gif|max:2048'
        ];
    }
    
    public function attributes()
    {
      return [
        'email' => 'メールアドレス',
        'username' => 'ユーザー名',
        'comment' => '自己紹介',
        'pic' => '画像',
      ];
    }
}
