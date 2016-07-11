<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class BaseData extends Model
{
    protected $table = 'System_Base_Data';//表名

    public function __construct()
    {
        $this->sort = 999;

    }

    /**
     *
     * @var array
     */
    protected $fillable = [
        'eid', 'tid', 'name', 'value', 'sort',
    ];

    /**
     * 获取应用到请求的验证规则
     *
     * @return array
     */
    public function createRules()
    {
        return [
            'name' => 'required',
            'tid' => 'required',
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
            'name' => 'required',
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
            'tid.required' => '请选择数据分类项',

        ];
    }

    /**
     * 所属分类
     */
    public function dataType()
    {
        return $this->belongsTo('App\Models\System\BaseType', 'tid');
    }
}
