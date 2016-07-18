<?php
namespace App\Models\Operator;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 航班控位-中转记录
 * @package App\Models
 */
class Control_Airways_Transfers extends Model
{
    use SoftDeletes;


    protected $table = 'Control_Airways_Transfers';//表名
    protected $primaryKey = "id";//主键


    protected $fillable = ['eid', 'line_id', 'back_days', 'start_flightid', 'start_date', 'start_course', 'start_shift', 'start_departure_time', 'start_arrivala_time', 'back_flightid', 'back_date', 'back_course', 'back_shift', 'back_departure_time', 'back_arrivala_time', 'control_num', 'drawers_limited', 'adult_price', 'child_price', 'control_state', 'remark', 'createid', 'editid', 'sort', 'state'];
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
            'shift' => 'required|unique:Airways_Flight|max:255|min:2',
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
            'shift.required' => '班次不能为空',
            'shift.unique' => '班次不能相同',
        ];
    }

    /**
     * 航空公司
     */
    public function airways()
    {
        return $this->belongsTo('App\Models\Resources\Airways', 'airways_id');
    }

    /**
     * 中转记录
     */
    public function transfers()
    {
        return $this->hasMany('App\Models\Operator\Control_Airways_Transfers', "ca_id");
    }


}
