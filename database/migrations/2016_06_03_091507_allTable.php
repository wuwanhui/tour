<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AllTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('System_Enterprise')) {
            Schema::create('System_Enterprise', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('pid');//所属上级
                $table->string('name');//企业全称
                $table->string('short_name');//企业简称
                $table->string('logo')->nullable();//标志
                $table->string('legal_person')->nullable();//法人代表
                $table->date('found_time')->nullable();//成立时间
                $table->string('phone')->nullable();//联系电话
                $table->string('fax')->nullable();//传真号码
                $table->string('address')->nullable();//地址
                $table->string('slogan')->nullable();//口号
                $table->string('abstract')->nullable();//企业简介
                $table->timestamps();
                $table->softDeletes();
            });
        }

        // 系统参数
        if (!Schema::hasTable('System_Config')) {
            Schema::create('System_Config', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('eid');
                $table->string('name');
                $table->string('logo')->nullable();
                $table->string('domain')->nullable();
                $table->string('assets_domain')->nullable();
                $table->string('qiniu_access')->nullable();
                $table->string('qiniu_secret')->nullable();
                $table->string('qiniu_bucket_name')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
        //部门表
        if (!Schema::hasTable('System_Dept')) {
            Schema::create('System_Dept', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('eid');//所属企业
                $table->integer('pid')->nullable();//所属上级
                $table->string('name');//部门全称
                $table->integer('legal_person')->nullable();//责任人
                $table->string('phone')->nullable();//联系电话
                $table->string('fax')->nullable();//传真号码
                $table->string('abstract')->nullable();//企业简介
                $table->timestamps();
                $table->softDeletes();
            });
        }

        // 用户表
        if (!Schema::hasTable('System_User')) {
            Schema::create('System_User', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('eid');
                $table->string('name');
                $table->string('email');
                $table->string('password')->nullable();
                $table->string('remember_token')->nullable();
                $table->integer('state')->defalut(0);//状态(0正常、1禁用)
                $table->timestamps();
                $table->softDeletes();
            });
        }

        // 用户部门对照表 (Many-to-Many)
        if (!Schema::hasTable('System_Dept_User')) {

            Schema::create('System_Dept_User', function (Blueprint $table) {
                $table->integer('user_id')->unsigned();
                $table->integer('dept_id')->unsigned();

                $table->foreign('user_id')->references('id')->on('System_User')
                    ->onUpdate('cascade')->onDelete('cascade');

                $table->foreign('dept_id')->references('id')->on('System_Dept')
                    ->onUpdate('cascade')->onDelete('cascade');

                $table->primary(['user_id', 'dept_id']);
            });
        }
        // 用户详情表
        if (!Schema::hasTable('System_User_Info')) {
            Schema::create('System_User_Info', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('uid');
                $table->string('name');//真实姓名
                $table->integer('sex')->defalut(0);//性别(0未知、1男、2女)
                $table->string('id_card')->nullable();//身份证号
                $table->date('birthday')->nullable();//生日
                $table->string('addres')->nullable();//地址
                $table->string('mobile')->nullable();//手机号
                $table->string('tel')->nullable();//办公电话
                $table->string('fax')->nullable();//传真
                $table->string('qq')->nullable();//qq
                $table->string('weibo')->nullable();//微博
                $table->string('weixin')->nullable();//微信号

                $table->timestamps();
                $table->softDeletes();
            });
        }
        // 密码重置表
        if (!Schema::hasTable('System_PassWord_Resets')) {
            Schema::create('System_PassWord_Resets', function (Blueprint $table) {
                $table->increments('id');
                $table->string('email')->unique();
                $table->string('token')->nullable();
                $table->timestamps();
            });
        }
        // 角色表
        if (!Schema::hasTable('System_Role')) {
            Schema::create('System_Role', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('eid');
                $table->string('name')->unique();
                $table->string('display_name')->nullable();
                $table->string('description')->nullable();
                $table->timestamps();
            });
        }
        // 用户角色对照表 (Many-to-Many)
        if (!Schema::hasTable('System_Role_User')) {
            Schema::create('System_Role_User', function (Blueprint $table) {
                $table->integer('user_id')->unsigned();
                $table->integer('role_id')->unsigned();

                $table->foreign('user_id')->references('id')->on('System_User')
                    ->onUpdate('cascade')->onDelete('cascade');

                $table->foreign('role_id')->references('id')->on('System_Role')
                    ->onUpdate('cascade')->onDelete('cascade');

                $table->primary(['user_id', 'role_id']);
            });
        }
        //权限表
        if (!Schema::hasTable('System_Permission')) {
            Schema::create('System_Permission', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->unique();
                $table->string('display_name')->nullable();
                $table->string('description')->nullable();
                $table->timestamps();
            });
        }
        // 角色权限对照表 (Many-to-Many)
        if (!Schema::hasTable('System_Permission_Role')) {

            Schema::create('System_Permission_Role', function (Blueprint $table) {
                $table->integer('permission_id')->unsigned();
                $table->integer('role_id')->unsigned();

                $table->foreign('permission_id')->references('id')->on('System_Permission')
                    ->onUpdate('cascade')->onDelete('cascade');
                $table->foreign('role_id')->references('id')->on('System_Role')
                    ->onUpdate('cascade')->onDelete('cascade');

                $table->primary(['permission_id', 'role_id']);
            });
        }

        // 基础数据分类 'name', 'code', 'abstract', 'state',
        if (!Schema::hasTable('System_BaseType')) {
            Schema::create('System_BaseType', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->integer('eid')->defalut(0);//默认为0表示系统
                $table->string('code')->unique();
                $table->string('abstract')->nullable();
                $table->integer('state')->defalut(0);//0系统、1自定义
                $table->timestamps();
            });
        }
        // 基础数据
        if (!Schema::hasTable('System_BaseData')) {
            Schema::create('System_BaseData', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('tid');
                $table->integer('eid');
                $table->text('name');
                $table->text('value');
                $table->integer('sort')->defalut(0);
                $table->timestamps();
            });
        }


        if (!Schema::hasTable('System_Menu')) {
            //系统菜单
            Schema::create('System_Menu', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('model');
                $table->string('page');
                $table->string('url');
                $table->integer('parent_id');
                $table->string('open');
                $table->integer('is_display');
                $table->string('describe');
                $table->integer('sort');
                $table->integer('state');
                $table->timestamps();
            });

        }


        if (!Schema::hasTable('Weixin_Config')) {
            Schema::create('Weixin_Config', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('weiXin');
                $table->string('appID');
                $table->string('appSecret');
                $table->string('token');
                $table->string('mchId');
                $table->string('pay_key');
                $table->string('encodingAESKey');
                $table->string('admin_openId');
                $table->string('welcom');
                $table->timestamps();
            });

        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::drop('users');
//        Schema::drop('permission_role');
//        Schema::drop('permissions');
//        Schema::drop('role_user');
//        Schema::drop('roles');
    }
}
