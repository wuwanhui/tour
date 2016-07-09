<?php
namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

/**
 * 部门设置
 * @package App\Models
 */
class Dept extends Model
{


    protected $table = 'System_Dept';//表名
    protected $primaryKey = "id";//主键

    protected $fillable = ['name', 'eid', 'pid', 'legal_person', 'phone', 'fax', 'abstract'];


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
            'name.required' => '部门名称为必填项',
        ];
    }


    /**
     * 所有用户
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\System\User', 'System_Dept_User', 'user_id', 'dept_id');
    }

    /**
     * 上级部门
     */
    public function parent()
    {
        return $this->belongsTo('App\Models\System\Dept');
    }

    /**
     * 下级部门
     */
    public function child()
    {
        return $this->hasMany('App\Models\System\Dept', "pid");
    }

}
