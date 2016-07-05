<?php
namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

/**
 * 系统参数
 * @package App\Models
 */
class Config extends Model
{
    protected $table = 'System_Config';//表名
    protected $primaryKey = "Id";//主键
    protected $fillable = [
        'id', 'eid', 'name', 'logo', 'domain', 'assets_domain', 'qiniu_access', 'qiniu_secret', 'qiniu_bucket_name',
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
            'name.required' => '系统名称为必填项',
        ];
    }

}
