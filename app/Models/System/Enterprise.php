<?php
namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

/**
 * 企业信息
 * @package App\Models
 */
class Enterprise extends Model
{


    protected $table = 'System_Enterprise';//表名
    protected $primaryKey = "id";//主键

    protected $fillable = ['name', 'short_name', 'logo', 'legal_person', 'found_time', 'phone', 'fax', 'address', 'slogan', 'abstract'];
    public function __construct()
    {

    }

    /**
     * 获取应用到请求的验证规则
     *
     * @return array
     */
    public function createRules()
    {
        return [
            'name' => 'required|unique:System_Enterprise|max:255|min:2',
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
            'name.required' => '企业全称为必填项',
            'name.unique' => '企业名称不能相同',
        ];
    }


    /**
     * 所有用户
     */
    public function users()
    {
        return $this->hasMany('App\Models\System\User', "eid");
    }

    /**
     * 上级企业
     */
    public function parent()
    {
        return $this->belongsTo('App\Models\System\Enterprise');
    }

    /**
     * 下级企业
     */
    public function child()
    {
        return $this->hasMany('App\Models\System\Enterprise', "pid");
    }

    /**
     * 系统参数
     */
    public function config()
    {
        return $this->hasOne('App\Models\System\Config', 'eid');
    }


}
