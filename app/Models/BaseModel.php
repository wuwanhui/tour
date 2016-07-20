<?php
namespace App\Models;

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
    public static function bootSoftDeletes()
    {
        parent::boot();
        static::addGlobalScope(new SoftDeletingScope());
    }

}
