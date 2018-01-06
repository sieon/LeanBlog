<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Eloquent\Model;
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
        // 清除缓存
        app()['cache']->forget('spatie.permission.cache');

        // 先创建权限
        Permission::create(['name' => 'contribute_contents']);
        Permission::create(['name' => 'publish_contents']);
        Permission::create(['name' => 'manage_contents']);
        Permission::create(['name' => 'manage_users']);
        Permission::create(['name' => 'edit_settings']);

        // 创建站长角色，并赋予权限
        $founder = Role::create(['name' => 'Founder']);
        $founder->givePermissionTo('contribute_contents');
        $founder->givePermissionTo('publish_contents');
        $founder->givePermissionTo('manage_contents');
        $founder->givePermissionTo('manage_users');
        $founder->givePermissionTo('edit_settings');

        // 创建管理员角色，并赋予权限
        $Administrator = Role::create(['name' => 'Administrator']);
        $Administrator->givePermissionTo('contribute_contents');
        $Administrator->givePermissionTo('publish_contents');
        $Administrator->givePermissionTo('manage_contents');
        $Administrator->givePermissionTo('manage_users');

        // 创建编辑角色
        $editor = Role::create(['name' => 'Editor']);
        $editor->givePermissionTo('contribute_contents');
        $editor->givePermissionTo('publish_contents');
        $editor->givePermissionTo('manage_contents');

        // 创建作者角色
        $author = Role::create(['name' => 'Author']);
        $author->givePermissionTo('contribute_contents');
        $author->givePermissionTo('publish_contents');

        // 创建投稿角色，并赋予权限
        $contributor = Role::create(['name' => 'Contributor']);
        $contributor->givePermissionTo('contribute_contents');


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // 清除缓存
        app()['cache']->forget('spatie.permission.cache');

        // 清空所有数据表数据
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
