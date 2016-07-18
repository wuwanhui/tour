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
        $config->name = "千番旅行";
        $enterprise->config()->save($config);

        //管理员
        $user = new \App\Models\System\User();
        $user->name = "管理员";
        $user->email = "wuhong@yeah.net";
        $user->password = bcrypt('admin');

        $enterprise->users()->save($user);

        //基础资料分类-购物类型
        $basTypee = new \App\Models\System\BaseType();
        $basTypee->name = '购物类型';
        $basTypee->code = 'shopping';
        $basTypee->save();
        //基础资料
        $baseDate = new \App\Models\System\BaseData();
        $baseDate->name = '购物行程';
        $baseDate->value = '1';
        $basTypee->datas()->save($baseDate);
        //基础资料
        $baseDate = new \App\Models\System\BaseData();
        $baseDate->name = '非购物行程';
        $baseDate->value = '0';
        $basTypee->datas()->save($baseDate);

        //基础资料分类-集合地
        $basTypee = new \App\Models\System\BaseType();
        $basTypee->name = '集合地';
        $basTypee->code = 'rendezvous';
        $basTypee->save();
        //基础资料
        $baseDate = new \App\Models\System\BaseData();
        $baseDate->name = '重庆';
        $baseDate->value = '重庆市江北机场';
        $basTypee->datas()->save($baseDate);


    }
}
