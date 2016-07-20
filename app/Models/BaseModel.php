<?php
namespace App\Models;

use App\Http\Facades\Base;
use App\Scopes\SoftDeletingScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Model基类
 * @package App\Models
 */
class BaseModel extends Model
{
    use SoftDeletes;
    protected $primaryKey = "id";//主键

    public function __construct()
    {

    }

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();
        static::addGlobalScope(new SoftDeletingScope());
    }


    /**
     * 只包含软删除的
     * @param $query
     * @return mixed
     */
    public function scopeonlyTrashed($query)
    {
        return $query->where('deleted_at', null);
    }

    /**
     * 所有（包含软删除的）
     * @param $query
     * @return mixed
     */
    public function scopewithTrashed($query)
    {
        return $query->where('deleted_at', null);
    }


    /**
     * 获取当前企业信息
     * @param $query
     * @return mixed
     */
    public function scopeEid($query, $eid = 0)
    {
        if ($eid == 0) {
            return $query->where('eid', Base::uid());
        } else {
            return $query->where('eid', $eid);
        }
    }

    /**
     * 获取创建者信息
     * @param $query
     * @return mixed
     */
    public function scopeCreate($query, $uid = 0)
    {
        if ($uid == 0) {
            return $query->where('createid', Base::uid());
        } else {
            return $query->where('createid', $uid);
        }

    }
}
