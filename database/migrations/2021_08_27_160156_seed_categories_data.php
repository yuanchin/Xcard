<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SeedCategoriesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $categories = [
            [
                'name'        => '八卦',
                'description' => '歡迎大家分享一些小道消息、名人趣事等等......',
            ],
            [
                'name'        => '股票',
                'description' => '歡迎大家分享自己的操作經驗、以及如何選股~~',
            ],
            [
                'name'        => '工作',
                'description' => '提供分享面試經驗、職場心得、打工或實習經驗等相關工作話題。',
            ],
            [
                'name'        => '軟體工程師',
                'description' => '歡迎大家討論在軟體開發路上遇到的各種困難及踩到的坑，用您的經驗幫助剛踏入軟體開發的新手吧~~',
            ],
        ];

        DB::table('categories')->insert($categories);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        DB::table('categories')->truncate();
    }
}
