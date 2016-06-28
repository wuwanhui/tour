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

        if (!Schema::hasTable('users')) {

            // 用户表
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('enterprise_id');
                $table->string('name')->unique();
                $table->string('email')->nullable();
                $table->string('password')->nullable();
                $table->string('remember_token')->nullable();
                $table->timestamps();
            });
        }
        if (!Schema::hasTable('password_resets')) {
            // 密码重置表
            Schema::create('password_resets', function (Blueprint $table) {
                $table->increments('id');
                $table->string('email')->unique();
                $table->string('token')->nullable();
                $table->timestamps();
            });
        }
        if (!Schema::hasTable('roles')) {
            // 角色表
            Schema::create('roles', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->unique();
                $table->string('display_name')->nullable();
                $table->string('description')->nullable();
                $table->timestamps();
            });
        }
        if (!Schema::hasTable('role_user')) {
            // 用户角色对照表 (Many-to-Many)
            Schema::create('role_user', function (Blueprint $table) {
                $table->integer('user_id')->unsigned();
                $table->integer('role_id')->unsigned();

                $table->foreign('user_id')->references('id')->on('users')
                    ->onUpdate('cascade')->onDelete('cascade');

                $table->foreign('role_id')->references('id')->on('roles')
                    ->onUpdate('cascade')->onDelete('cascade');

                $table->primary(['user_id', 'role_id']);
            });
        }
        if (!Schema::hasTable('permissions')) {
            //权限表
            Schema::create('permissions', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->unique();
                $table->string('display_name')->nullable();
                $table->string('description')->nullable();
                $table->timestamps();
            });
        }
        if (!Schema::hasTable('permission_role')) {
            // 角色权限对照表 (Many-to-Many)
            Schema::create('permission_role', function (Blueprint $table) {
                $table->integer('permission_id')->unsigned();
                $table->integer('role_id')->unsigned();

                $table->foreign('permission_id')->references('id')->on('permissions')
                    ->onUpdate('cascade')->onDelete('cascade');
                $table->foreign('role_id')->references('id')->on('roles')
                    ->onUpdate('cascade')->onDelete('cascade');

                $table->primary(['permission_id', 'role_id']);
            });
        }
        if (!Schema::hasTable('system_menu')) {
            //系统菜单
            Schema::create('system_menu', function (Blueprint $table) {
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

        if (!Schema::hasTable('enterprise')) {
            Schema::create('enterprise', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('parent_id');//所属上级
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
            });
        }

        if (!Schema::hasTable('weixin_config')) {
            Schema::create('weixin_config', function (Blueprint $table) {
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
        Schema::drop('users');
        Schema::drop('permission_role');
        Schema::drop('permissions');
        Schema::drop('role_user');
        Schema::drop('roles');
    }
}
