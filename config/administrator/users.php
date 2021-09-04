<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;

return [
    // 頁面標題
    'title' => '用戶',

    // 模型單數，用作頁面『新建 $single』
    'single' => '用戶',

    // 數據模型，作為數據的 CRUD
    'model' => User::class,

    // 設置當前頁面的訪問
    'permission' => function()
    {
        return Auth::user()->can('manage_users');
    },

    // 欄位負責渲染『數據表格』，由無數的『行』组成
    'columns' => [
        'id',

        'avatar' => [
            'title' => '頭像',

            'output' => function ($avatar, $model) {
                return empty($avatar) ? 'N/A' : '<img src="'.$avatar.'" width="40">';
            },

            // 是否允許排序
            'sortable' => false,
        ],

        'name' => [
            'title'    => '用戶名',
            'sortable' => false,
            'output'   => function ($name, $model) {
                return '<a href="/users/' . $model->id . '" target=_blank>' . $name . '</a>';
            },
        ],

        'email' => [
            'title' => '信箱',
        ],

        'operation' => [
            'title' => '管理',
            'sortable' => false,
        ],
    ],

    // 『模型表單』設置項
    'edit_fields' => [
        'name' => [
            'title' => '用戶名',
        ],

        'email' => [
            'title' => '信箱',
        ],

        'password' => [
            'title' => '密碼',

            // 表單使用 input 類型 password
            'type' => 'password',
        ],

        'avatar' => [
            'title' => '用戶頭像',

            // 設置表單條目類型，默認的 type 為 input
            'type' => 'image',

            // 圖片上傳必須設置圖片存放路徑
            'location' => public_path() . '/uploads/images/avatars/',
        ],

        'roles' => [
            'title' => '用戶角色',

            // 指定數據類型為關聯類型
            'type' => 'relationship',

            // 關聯的欄位，用來做關聯顯示
            'name_field' => 'name',
        ],

    ],

    // 『數據過濾』設置
    'filters' => [
        'id' => [

            // 過濾表單條目顯示名稱
            'title' => '用戶 ID',
        ],
        'name' => [
            'title' => '用戶名',
        ],
        'email' => [
            'title' => '信箱',
        ],
    ],


];