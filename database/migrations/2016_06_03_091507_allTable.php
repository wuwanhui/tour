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
                $table->string('name')->unique();;//企业全称
                $table->string('short_name');//企业简称
                $table->string('logo');//标志
                $table->string('legal_person');//法人代表
                $table->string('found_time');//成立时间
                $table->string('phone');//联系电话
                $table->string('fax');//传真号码
                $table->string('address');//地址
                $table->string('slogan');//口号
                $table->string('abstract');//企业简介
                $table->timestamps();
                $table->softDeletes();
            });
        }

        // 系统参数
        if (!Schema::hasTable('System_Config')) {
            Schema::create('System_Config', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('eid');
                $table->string('name')->unique();
                $table->string('logo');
                $table->string('domain');
                $table->string('assets_domain');
                $table->string('qiniu_access');
                $table->string('qiniu_secret');
                $table->string('qiniu_bucket_name');
                $table->timestamps();
                $table->softDeletes();
            });
        }

        // 用户表
        if (!Schema::hasTable('System_User')) {
            Schema::create('System_User', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('eid');
                $table->string('name')->unique();
                $table->string('email')->nullable();
                $table->string('password')->nullable();
                $table->string('remember_token')->nullable();
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
