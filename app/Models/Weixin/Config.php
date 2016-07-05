<?php
namespace App\Models\Weixin;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $table = 'System_Config';//表名
    protected $primaryKey = "Id";//主键
    protected $fillable = [
        'Id', 'Name', 'WeiXin', 'AppID', 'AppSecret', 'Token', 'MchId', 'PayKey', 'EncodingAESKey', 'AdminOpenId', 'Welcom'
    ];

}
