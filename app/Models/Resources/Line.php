<?php
namespace App\Models\Resources;

use App\Models\BaseModel;
use Cache;

/**
 * 航空公司
 * @package App\Models
 */
class Line extends BaseModel
{

    protected $table = 'Resources_Line';//表名
    protected $primaryKey = "id";//主键


    protected $fillable = ['id', 'eid', 'name', 'days', 'headerh_image', 'shopping', 'characteristic', 'service_standards', 'considerations', 'attachment', 'is_control_airways', 'remark', 'createid', 'editid', 'sort', 'state'];
    protected $dates = ['deleted_at'];
    protected $guarded = [];


    public function __construct()
    {

    }


    /**
     * 获取是否支持控位产品
     * @param $query
     * @param $type
     * @return mixed
     */
    public function scopeControlAirways($query, $type)
    {

        return $query->where('is_control_airways', $type);
    }


    /**
     * 获取应用到请求的验证规则
     *
     * @return array
     */
    public function createRules()
    {
        return [
            'name' => 'required|unique:Resources_Line|max:255|min:2',
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
            'name.required' => '名称不能为空',
            'name.unique' => '名称不能相同',
        ];
    }


}
