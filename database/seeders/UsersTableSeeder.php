<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 生成數據集合
        User::factory()->count(10)->create();

        // 單獨處理第一個用戶的資料
        $user = User::find(1);
        $user->name = 'yuanchin';
        $user->email = 'cs861229503@gmail.com';
        $user->avatar = 'http://xcard.test/uploads/images/avatar/202108/27/1_1630023313_TLld5TRhAa.jpg';
        $user->save();
    }
}
