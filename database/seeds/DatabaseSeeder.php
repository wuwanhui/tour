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
        //企业信息
        $enterprise = new \App\Models\System\Enterprise();
        $enterprise->name = '重庆元佑科技有限公司';
        $enterprise->short_name = '元佑科技';
        $enterprise->save();

        //系统参数
        $config = new \App\Models\System\Config();
        $config->name = "重庆元佑科技有限公司";
        $enterprise->config()->save($config);

        //管理员
        $user = new \App\Models\System\User();
        $user->name = "管理员";
        $user->email = "wuhong@yeah.net";
        $user->password = bcrypt('admin');

        $enterprise->users()->save($user);
    }
}
