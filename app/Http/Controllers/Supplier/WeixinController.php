<?php

namespace App\Http\Controllers\Supplier;

use App\Models\Weixin_Config;
use Cache;
use EasyWeChat\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


class WeixinController extends BaseController
{

    /**
     * 微信参数设置
     *
     * @return Response
     */
    public function index()
    {
        $wechat = app('wechat');

        $menuService = $wechat->menu;
        $menus = $menuService->all();

        echo($menus);
    }

}