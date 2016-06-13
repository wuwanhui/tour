<?php

namespace App\Http\Controllers;

use Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


class WeixinController extends Controller
{
    public function __construct()
    {
    }

    /**
     * 微信参数设置
     *
     * @return Response
     */
    public function index()
    {
        echo(json(['msg' => 'OK']));
    }

}