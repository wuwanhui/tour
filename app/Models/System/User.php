<?php

namespace App\Models\System;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{


    protected $table = 'System_User';//表名


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'eid', 'did', 'name', 'email', 'mobile', 'password', 'email_check', 'mobile_check', 'state',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * 获取应用到请求的验证规则
     *
     * @return array
     */
    public function createRules()
    {
        return [
            'name' => 'required|max:255|min:2',
            'email' => 'required|unique:System_User',
            'mobile' => 'required|unique:System_User',
        ];
    }

    /**
     * 获取应用到请求的验证规则
     *
     * @return array
     */
    public function editRules()
    {
        return [
            'name' => 'required|max:255|min:2',
            'email' => 'required',
            'mobile' => 'required',
        ];
    }


    /**
     * 获取应用到请求的验证规则
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => '用户名称为必填项',
            'email.required' => '用户邮箱为必填项',
            'email.unique' => '用户邮箱不能重复',
            'mobile.required' => '手机号为必填项',
            'mobile.unique' => '手机号不能重复',
        ];
    }

    /**
     * 用户角色
     */
    public function roles()
    {
        return $this->belongsToMany('App\Models\System\Role', 'System_Role_User', 'user_id', 'role_id');
    }

    /**
     * 所在部门
     */
    public function depts()
    {
        return $this->belongsToMany('App\Models\System\Dept', 'System_Dept_User', 'user_id', 'dept_id');
    }

    /**
     * 用户详情
     */
    public function userinfo()
    {
        return $this->hasOne('App\Models\System\User_Info', 'uid');
    }

    /**
     * 所属企业
     */
    public function enterprise()
    {
        return $this->belongsTo('App\Models\System\Enterprise', 'eid');
    }


    /**
     * 所属部门
     */
    public function dept()
    {
        return $this->belongsTo('App\Models\System\Dept', 'did');
    }
}
