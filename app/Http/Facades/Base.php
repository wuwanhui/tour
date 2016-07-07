<?php
namespace App\Http\Facades;

use Illuminate\Support\Facades\Facade;

class Base extends Facade
{
    /**
     * 获取组件注册名称
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'base';
    }
}