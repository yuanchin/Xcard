<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
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
            'name' => 'required|between:3,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:users,name,' . Auth::id(),
            'email' => 'required|email',
            'introduction' => 'max:100',
            'avatar' => 'mimes:png,jpg,gif,jpeg|dimensions:min_width=208,min_height=208',
        ];
    }

    /**
     * 自定義表單提示信息
     * 
     * @return array
     */
    public function messages()
    {
        return [
            'avatar.mimes'      => '頭貼必須是 png, jpg, gif, jpeg 格式的圖片',
            'avatar.dimensions' => '圖片的解析度不夠，寬和高需要 208px 以上',
            'name.unique'       => '用戶名已經被占用，請換一個',
            'name.regex'        => '用戶名僅支持英文、數字、橫槓和下划線',
            'name.between'      => '用戶名必須介於 3 - 25 個字符之間。',
            'name.required'     => '用戶名不能為空。',
        ];
    }
}
