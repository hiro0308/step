<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StepRequest extends FormRequest
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
            'title' => 'required|max:50',
            'category' => 'required|integer|min:1',
            'comment' => 'required|max:500',
            // 'subTitle1' => 'required|max:50',
            // 'description1' => 'required|max:500',
            // 'subTitle2' => 'required|max:50',
            // 'description2' => 'required|max:500',
            // 'subTitle3' => 'required|max:50',
            // 'description3' => 'required|max:500',
            // 'subTitle4' => 'required|max:50',
            // 'description4' => 'required|max:500',
            // 'subTitle5' => 'required|max:50',
            // 'description5' => 'required|max:500',
        ];
    }
    
    public function messages()
    {
      return [
        'category.min' => 'カテゴリーが正しく入力されていません。'
      ];
    }
    
    public function attributes()
    {
      return[
        'title' => '概要のタイトル',
        'category' => 'カテゴリー',
        'comment' => '概要の「できること」',
        // 'subTitle1' => 'Step1のタイトル',
        // 'description1' => 'Step2の内容',
        // 'subTitle2' => 'Step2のタイトル',
        // 'description2' => 'Step2の内容',
        // 'subTitle3' => 'Step3のタイトル',
        // 'description3' => 'Step3の内容',
        // 'subTitle4' => 'Step4のタイトル',
        // 'description4' => 'Step4の内容',
        // 'subTitle5' => 'Step5のタイトル',
        // 'description5' => 'Step5の内容',
      ];
    }
}
