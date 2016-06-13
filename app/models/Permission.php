<?php
namespace App\Models;


use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
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
            'required' => '必填项',
            'same' => 'The :attribute and :other must match.',
            'size' => 'The :attribute must be exactly :size.',
            'min' => '不能少于 :min个字符',
            'max' => 'The :attribute must be exactly :max.',
            'between' => 'The :attribute must be between :min - :max.',
            'in' => 'The :attribute must be one of the following types: :values',
        ];
    }


}