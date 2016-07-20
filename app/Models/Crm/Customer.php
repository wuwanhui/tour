<?php
namespace App\Models\Crm;

use App\Http\Facades\Base;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 客户档案
 * @package App\Models
 */
class Customer extends BaseModel
{
    use SoftDeletes;


    protected $table = 'Crm_Customer';//表名
    protected $primaryKey = "id";//主键


    protected $fillable = ['eid', 'pid', 'name', 'person_liable', 'mobile', 'tel', 'fax', 'qq', 'email', 'addres', 'commissioner_id', 'remark', 'createid', 'editid', 'sort', 'state'];
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
     * 本地作用域(获取当前我创建的客户)
     * @param $query
     * @return mixed
     */
    public function scopeCreate($query) {
        return $query->where('createid', Base::eid()); }

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

    /**
     * 所属专员
     */
    public function commissioner()
    {
        return $this->belongsTo('App\Models\System\User', 'commissioner_id');
    }

}
