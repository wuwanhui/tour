<?php
namespace App\Models\Resources;

use App\Models\BaseModel;
use App\Scopes\SoftDeletingScope;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 航空公司
 * @package App\Models
 */
class Airways extends BaseModel
{

    protected $table = 'Resources_Airways';//表名


    protected $fillable = ['eid', 'name', 'linkman', 'mobile', 'tel', 'fax', 'abstract', 'createid', 'editid', 'sort', 'state'];
    protected $dates = ['deleted_at'];

    public function __construct()
    {

    }

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    public static function bootSoftDeletes()
    {
        parent::boot();
        static::addGlobalScope(new SoftDeletingScope());
    }


    /**
     * 获取应用到请求的验证规则
     *
     * @return array
     */
    public function createRules()
    {
        return [
            'name' => 'required|unique:Resources_Airways|max:255|min:2',
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

    /**
     * 所有班次
     */
    public function flights()
    {
        return $this->hasMany('App\Models\Resources\Airways_Flight', "airways_id");
    }
}
