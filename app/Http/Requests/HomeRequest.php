<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class HomeRequest extends FormRequest
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
            'desk_id'=>'required|numeric',
           
        ];
    }

    public function messages()
    {
        return [
            'desk_id.required' => '请求失败，请重新扫码',
            'desk_id.numeric' => '请求的桌号必须是数值',
           
        ];
    }
}
