<?php

return [
    'title' => '站點設置',

    // 訪問權限判斷
    'permission' => function()
    {
        // 與允許站長管理站點配置
        return Auth::user()->hasRole('Founder');
    },

    // 站點配置表單
    'edit_fields' => [
        'site_name' => [
            // 表單標題
            'title' => '站點名稱',

            // 表單條目類型
            'type' => 'text',

            // 字數限制
            'limit' => 50,
        ],

        'contact_email' => [
            'title' => '聯繫人信箱',
            'type' => 'text',
            'limit' => 50,
        ],

        'seo_description' => [
            'title' => 'SEO - Description',
            'type' => 'textarea',
            'limit' => 250,
        ],

        'seo_keyword' => [
            'title' => 'SEO - Keywords',
            'type' => 'textarea',
            'limit' => 250,
        ],
    ],

    // 表單驗證規則
    'rules' => [
        'site_name' => 'required|max:50',
        'contact_email' => 'email',
    ],

    'messages' => [
        'site_name.required' => '請填寫站點名稱。',
        'contact_email.email' => '請填寫正確的聯繫人信箱格式。',
    ],

    // 數據即將保存時觸發的鉤子，可以對用戶提交的數據做修改
    'before_save' => function(&$data)
    {
        // 為網站名稱加上後綴，加上判斷是為了防止多次添加
        if (strpos($data['site_name'], 'Powered by yuanchin') === false) {
            $data['site_name'] .= ' - Powered by yuanchin';
        }
    },

    // 你可以自訂億多個動作，每一個動作為設置頁面底部的『其他操作』區塊
    'actions' => [

        // 清空緩存
        'clear_cache' => [
            'title' => '更新系统缓存',

            // 不同狀態時頁面的提醒
            'messages' => [
                'active' => '正在清空緩存...',
                'success' => '緩存已經清空！',
                'error' => '清空緩存時出錯！',
            ],

            // 動作執行代碼，注意你可以通過修改 $data 參數更改配置訊息
            'action' => function(&$data)
            {
                \Artisan::call('cache:clear');
                return true;
            }
        ],
    ],
];