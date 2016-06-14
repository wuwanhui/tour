<?php

namespace App\Http\Controllers;


use Log;

class WechatController extends Controller
{
    /**
     * 处理微信的请求消息
     *
     * @return string
     */
    public function index()
    {

        Log::info('Showing user profile for user: ');
        $wechat = app('wechat');
        $wechat->server->setMessageHandler(function ($message) {
            return "欢迎关注 overtrue！";
        });
        // Logger::getLogger(Logger::LOG_ERROR)->error('request arrived.');

        return $wechat->server->serve();
    }

}