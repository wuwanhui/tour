<?php
namespace App\Models;


use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    protected $fillable = ['name', 'display_name', 'description'];
    protected $guarded = ['updated_at', 'created_at'];

    /**
     * 获取应用到请求的验证规则
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:permissions|max:255|min:2',
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
            'name.required' => '权限标识必填项',
            'display_name.required' => '权限名称必填项',
            'name.unique' => '权限标识不可重复',
            'size' => 'The :attribute must be exactly :size.',
            'min' => '不能少于 :min个字符',
            'max' => 'The :attribute must be exactly :max.',
            'between' => 'The :attribute must be between :min - :max.',
            'in' => 'The :attribute must be one of the following types: :values',
        ];
    }


}