<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class EditPassRequest extends FormRequest
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
            'pass_old' => [
              'required',
              'min:8',
              'string',
              function ($attribute, $value, $fail) {
                if(!(Hash::check($value, Auth::user()->password))) {
                  return $fail('現在のパスワードを正しく入力して下さい');
                }
              }
            ],
            'pass_new' => 'required|min:8|string|confirmed|different:pass_old',
        ];
    }
    
    public function attributes()
    {
      return [
        'pass_old' => '現在のパスワード',
        'pass_new' => '新しいパスワード',
      ];
    }
}
