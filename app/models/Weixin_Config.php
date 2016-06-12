<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Weixin_Config extends Model
{
    protected $table = 'Weixin_Config';//表名
    protected $primaryKey = "Id";//主键
    protected $fillable = [
        'Id', 'Name', 'WeiXin', 'AppID', 'AppSecret', 'Token', 'MchId', 'PayKey', 'EncodingAESKey', 'AdminOpenId', 'Welcom'
    ];

}
