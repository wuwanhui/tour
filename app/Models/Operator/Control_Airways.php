<?php
namespace App\Models\Operator;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 航班控位
 * @package App\Models
 */
class Control_Airways extends Model
{
    use SoftDeletes;


    protected $table = 'Control_Airways';//表名
    protected $primaryKey = "id";//主键


    protected $fillable = ['eid', 'line_id', 'back_days', 'start_date', 'start_flight_id', 'start_course', 'start_shift', 'start_departure_time', 'start_arrivala_time', 'back_date', 'back_flightid', 'back_course', 'back_shift', 'back_departure_time', 'back_arrivala_time', 'control_num', 'drawers_limited', 'adult_price', 'child_price', 'control_state', 'remark', 'createid', 'editid', 'sort', 'state'];
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
            'line_id' => 'required',
            'start_date' => 'required|max:255|min:2',
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
            'start_date' => 'required|max:255|min:2',
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
            'line_id.required' => '线路资源不能为空',
            'start_date.required' => '航班时间不能为空',
        ];
    }
    /**
     * 关联线路
     */
    public function line()
    {
        return $this->belongsTo('App\Models\Resources\Line', 'line_id');
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
        return $this->hasMany('App\Models\Operator\Control_Airways_Transfer', "control_airways_id");
    }


}
