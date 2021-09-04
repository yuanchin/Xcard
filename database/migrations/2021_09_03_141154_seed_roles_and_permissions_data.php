<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class SeedRolesAndPermissionsData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 清除緩存，避免報錯
        app(Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        // 創建權限
        Permission::create(['name' => 'manage_contents']);
        Permission::create(['name' => 'manage_users']);
        Permission::create(['name' => 'edit_settings']);

        // 創建站長角色並賦予權限
        $founder = Role::create(['name' => 'Founder']);
        $founder->givePermissionTo('manage_contents');
        $founder->givePermissionTo('manage_users');
        $founder->givePermissionTo('edit_settings');

        // 創建管理員角色並賦予權限
        $administrator = Role::create(['name' => 'Administrator']);
        $administrator->givePermissionTo('manage_contents');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // 清除緩存，避免報錯
        app(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        // 清空所有資料表的資料
        $tableNames = config('permission.table_names');

        Model::unguard();
            DB::table($tableNames['role_has_permissions'])->delete();
            DB::table($tableNames['model_has_roles'])->delete();
            DB::table($tableNames['model_has_permissions'])->delete();
            DB::table($tableNames['roles'])->delete();
            DB::table($tableNames['permissions'])->delete();
        Model::reguard();
    }
}
