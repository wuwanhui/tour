<?php

namespace App\Models\System;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User_Info extends Authenticatable
{
    protected $table = 'System_User_Info';//表名

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uid', 'name', 'email', 'password',
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
     * 所属企业
     */
    public function enterprise()
    {
        return $this->belongsTo('App\Models\System\Enterprise', 'eid');
    }


}
