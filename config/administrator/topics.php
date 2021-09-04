<?php

use App\Models\Topic;

return [
    'title'   => '話題',

    'single'  => '話題',

    'model'   => Topic::class,

    'columns' => [

        'id' => [
            'title' => 'ID',
        ],

        'title' => [
            'title'    => '話題',
            'sortable' => false,
            'output'   => function ($value, $model) {
                return '<div style="max-width:260px">' . model_link($value, $model) . '</div>';
            },
        ],

        'user' => [
            'title'    => '作者',
            'sortable' => false,
            'output'   => function ($value, $model) {
                $avatar = $model->user->avatar;
                $value = empty($avatar) ? 'N/A' : '<img src="' . $avatar . '" style="height:22px;width:22px"> ' . $model->user->name;
                return model_link($value, $model->user);
            },
        ],

        'category' => [
            'title'    => '分類',
            'sortable' => false,
            'output'   => function ($value, $model) {
                return model_admin_link($model->category->name, $model->category);
            },
        ],

        'reply_count' => [
            'title'    => '評論',
        ],

        'operation' => [
            'title'  => '管理',
            'sortable' => false,
        ],
    ],

    'edit_fields' => [
        'title' => [
            'title'    => '標題',
        ],

        'user' => [
            'title'              => '用戶',
            'type'               => 'relationship',
            'name_field'         => 'name',

            // 自動補全，對於大量數據的對應關係，推薦開啟自動補全，
            // 可防止一次性加載對系統造成負擔
            'autocomplete'       => true,

            // 自動補全的搜尋字段
            'search_fields'      => ["CONCAT(id, ' ', name)"],

            // 自動補全排序
            'options_sort_field' => 'id',
        ],

        'category' => [
            'title'              => '分類',
            'type'               => 'relationship',
            'name_field'         => 'name',
            'search_fields'      => ["CONCAT(id, ' ', name)"],
            'options_sort_field' => 'id',
        ],

        'reply_count' => [
            'title'    => '評論',
        ],

        'view_count' => [
            'title'    => '查看',
        ],
    ],

    'filters' => [
        'id' => [
            'title' => '内容 ID',
        ],

        'user' => [
            'title'              => '用戶',
            'type'               => 'relationship',
            'name_field'         => 'name',
            'autocomplete'       => true,
            'search_fields'      => array("CONCAT(id, ' ', name)"),
            'options_sort_field' => 'id',
        ],

        'category' => [
            'title'              => '分類',
            'type'               => 'relationship',
            'name_field'         => 'name',
            'search_fields'      => array("CONCAT(id, ' ', name)"),
            'options_sort_field' => 'id',
        ],
    ],

    'rules'   => [
        'title' => 'required'
    ],

    'messages' => [
        'title.required' => '請填寫標題',
    ],
];