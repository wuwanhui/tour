<?php
namespace App\Models;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    protected $fillable = ['name', 'display_name', 'description'];
    protected $guarded = ['updated_at', 'created_at'];

    /**
     * 角色用户
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

    /**
     * 获取
     */
    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission');
    }

    /**
     * 获取应用到请求的验证规则
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:roles|max:255|min:2',
            'display_name' => 'required',
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
            'name.required' => '角色名称为必填项',
            'display_name.required' => '角色显示名称为必填项',
            'name.min' => '角色名称不能少于 :min个字符',
            'name.max' => '角色名称不能大于于 :max个字符',
        ];
    }


}