<?php
namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 航班信息
 * @package App\Models
 */
class Airways_Flight extends Model
{
    use SoftDeletes;


    protected $table = 'Airways_Flight';//表名
    protected $primaryKey = "id";//主键


    protected $fillable = ['eid', 'airways_id', 'course', 'shift', 'departure_time', 'arrivala_time', 'remark', 'createid', 'editid', 'sort', 'state'];
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
            'hift' => 'required|unique:Airways_Flight|max:255|min:2',
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
            'hift' => 'required|max:255|min:2',
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
            'hift.required' => '班次不能为空',
            'hift.unique' => '班次不能相同',
        ];
    }

    /**
     * 航空公司
     */
    public function airways()
    {
        return $this->belongsTo('App\Models\Resources\Airways', 'airways_id');
    }
}
