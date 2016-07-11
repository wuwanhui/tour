<?php

namespace App\Http\Controllers;

use Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Redirect;

/**
 * 安装管理
 * @package App\Http\Controllers\Manage
 */
class InstallController extends Controller
{
    /**
     * 主页
     */
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            $exitCode = Artisan::call('tour:install', [
                'name' => '元佑科技']);
            if ($exitCode == 0) {
                return redirect("/login");
            } else {
                return Redirect::back()->withInput()->withError("初始安装失败！");
            }
        }
        return view('install');
    }


}