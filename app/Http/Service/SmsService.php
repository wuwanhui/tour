<?php

namespace App\Http\Service;

use App\Models\System\BaseType;
use Illuminate\Support\Facades\Auth;

/**
 * 短信服务
 * @package App\Http\Service
 */
class SmsService
{

    public function __construct()
    {

    }


    /**
     * 根据基础数据标识获取基础数据
     * @param $key
     * @return mixed
     */
    public function data($key)
    {
        $baseType = BaseType::where('code', $key)->first();
        if ($baseType) {
            return $baseType->datas();
        }
    }


}