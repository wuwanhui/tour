<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class BaseType extends Model
{
    protected $table = 'System_Base_Type';//表名

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'eid', 'name', 'code', 'abstract', 'state',
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
            'code' => 'required|unique:System_BaseType',
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
            'name.required' => '名称为必填项',
            'code.required' => '编码为必填项',
            'code.unique' => '编码不能重复',
        ];
    }


    /**
     * 基础数据
     */
    public function datas()
    {
        return $this->hasMany('App\Models\System\BaseData', "tid");
    }
}
