<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    protected $table = 'enterprise';//表名
    protected $primaryKey = "id";//主键

    protected $fillable = ['parent_id', 'name', 'short_name', 'logo', 'legal_person', 'found_time', 'phone', 'fax', 'address', 'slogan', 'abstract'];


    /**
     * 获取应用到请求的验证规则
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:roles|max:255|min:2',
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


        ];
    }

    /**
     * 所有用户
     */
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

}
