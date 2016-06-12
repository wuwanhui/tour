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
        if (!Schema::hasTable('System_Menu')) {
            //系统菜单
            Schema::create('System_Menu', function (Blueprint $table) {
                $table->increments('Id');
                $table->string('Name');
                $table->string('Model');
                $table->string('Page');
                $table->string('Url');
                $table->integer('ParentId');
                $table->string('Open');
                $table->integer('IsDisplay');
                $table->string('Describe');
                $table->integer('Sort');
                $table->integer('State');
                $table->timestamps();
            });

        }

        if (!Schema::hasTable('System_Enterprise')) {
            Schema::create('System_Enterprise', function (Blueprint $table) {
                $table->increments('Id');
                $table->integer('ParentId');//所属上级
                $table->string('Name');//企业全称
                $table->string('ShortName');//企业简称
                $table->string('Logo');//标志
                $table->string('LegalPerson');//法人代表
                $table->string('FoundTime');//成立时间
                $table->string('Phone');//联系电话
                $table->string('Fax');//传真号码
                $table->string('Address');//地址
                $table->string('Slogan');//口号
                $table->string('Abstract');//企业简介
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('Weixin_Config')) {
            Schema::create('Weixin_Config', function (Blueprint $table) {
                $table->increments('Id');
                $table->string('Name');
                $table->string('WeiXin');
                $table->string('AppID');
                $table->string('AppSecret');
                $table->string('Token');
                $table->string('MchId');
                $table->string('PayKey');
                $table->string('EncodingAESKey');
                $table->string('AdminOpenId');
                $table->string('Welcom');
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
