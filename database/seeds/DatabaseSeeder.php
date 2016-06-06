<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * 运行数据库填充
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->truncate();


        $menuid = DB::table('menus')->insertGetId(array('id' => md5(uniqid(rand())), 'Name' => '系统设置', 'Model' => 'system', 'Page' => 'config', 'Url' => '/system/config/'));
        echo($menuid);
        DB::table('menus')->insert(array('id' => md5(uniqid(rand())), 'Name' => '系统设置', 'Model' => 'system', 'Page' => 'config', 'Url' => '/system/config/', 'ParentId' => $menuid));
    }
}
