<?php
namespace App\Models\Operator;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 航班控位-中转记录
 * @package App\Models
 */
class Control_Airways_Transfer extends Model
{
    use SoftDeletes;


    protected $table = 'Control_Airways_Transfer';//表名
    protected $primaryKey = "id";//主键


    protected $fillable = ['eid', 'control_airways_id', 'control_day', 'transfer_type', 'transfer_date', 'transfer_flight_id', 'transfer_course', 'transfer_shift', 'transfer_departure_time', 'transfer_arrivala_time', 'remark', 'createid', 'editid', 'sort', 'state'];
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
            'transfer_course' => 'required|max:255|min:2',
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
            'transfer_course' => 'required|max:255|min:2',
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
            'transfer_course.required' => '中转航向不能为空',
        ];
    }

    /**
     * 所属控位
     */
    public function control_airways()
    {
        return $this->belongsTo('App\Models\Operator\Control_Airways', 'control_airways_id');
    }




}
