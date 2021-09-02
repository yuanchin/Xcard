<?php

namespace App\Http\Requests;

class ReplyRequest extends Request
{
    public function rules()
    {
        return [
            'content' => 'required|min:2',
        ];
    }

    public function messages()
    {
        return [
            'content.min'      => '內容不能低於 2 個字。',
            'content.required' => '內容不能為空。', 
        ];
    }
}
