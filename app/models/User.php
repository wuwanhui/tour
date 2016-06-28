<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'eid', 'name', 'email', 'password',
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
    public function rules()
    {
        return [
            'name' => 'required|unique:roles|max:255|min:2',
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

        ];
    }

    /**
     * 用户角色
     */
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }

    /**
     * 所属企业
     */
    public function enterprise()
    {
        return $this->belongsTo('App\Models\Enterprise');
    }
}
