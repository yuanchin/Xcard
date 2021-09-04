<?php

use App\Models\Category;

return [
    'title'   => '分類',

    'single'  => '分類',

    'model'   => Category::class,

    // 對 CRUD 動作的單獨權限控制，其他動作不指定默認為通過
    'action_permissions' => [
        // 刪除權限控制
        'delete' => function () {
            // 僅有站長才能刪除話題分類
            return Auth::user()->hasRole('Founder');
        },
    ],

    'columns' => [
        'id' => [
            'title' => 'ID',
        ],

        'name' => [
            'title'    => '名稱',
            'sortable' => false,
        ],

        'description' => [
            'title'    => '描述',
            'sortable' => false,
        ],

        'operation' => [
            'title'  => '管理',
            'sortable' => false,
        ],
    ],

    'edit_fields' => [
        'name' => [
            'title' => '名稱',
        ],

        'description' => [
            'title' => '描述',
            'type'  => 'textarea',
        ],
    ],

    'filters' => [
        'id' => [
            'title' => '分類 ID',
        ],

        'name' => [
            'title' => '名稱',
        ],

        'description' => [
            'title' => '描述',
        ],
    ],

    'rules'   => [
        'name' => 'required|min:1|unique:categories'
    ],

    'messages' => [
        'name.unique'   => '分類名在數據庫裡有重複，請選用其他名稱。',
        'name.required' => '請確保名字至少一個字符以上',
    ],
];