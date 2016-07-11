<?php
namespace App\Http\Facades;

use Illuminate\Support\Facades\Facade;

class SMS extends Facade
{
    /**
     * 获取组件注册名称
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'sms';
    }
}