<?php

namespace App\Http\Controllers\Supplier;

use App\Models\Weixin_Config;
use Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


class WeixinConfigController extends BaseController
{
    /**
     * 微信参数设置
     *
     * @return Response
     */
    public function index()
    {
        $weixin = Weixin_Config::first();
        if ($weixin == null) {
            $weixin = new Weixin_Config();
        }
        return view('supplier.weixin.config.index', ['model' => 'weixin', 'menu' => 'config', 'weixin' => $weixin]);
    }

    /**
     * 微信参数设置
     *
     * @return Response
     */
    public function store(Request $request)
    {
//        $validator = Validator::make(Input::all(), $rules, $messages);
//
//        $this->validate($request, [
//            'Name' => 'required|unique:Weixin_Config|max:1',
//            'WeiXin' => 'required',
//        ]);

//        $validator = Validator::make(Input::all(), Weixin_Config::$rules);
//        if ($validator->passes()) {

        $weixinConfig = new Weixin_Config();//实例化User对象
        $id = Input::get('Id');
        if ($id > 0) {
            $weixinConfig = Weixin_Config::find($id);
        }
        $weixinConfig->Name = Input::get('Name');
        $weixinConfig->WeiXin = Input::get('WeiXin');
        $weixinConfig->AppID = Input::get('AppID');
        $weixinConfig->AppSecret = Input::get('AppSecret');
        $weixinConfig->Token = Input::get('Token');
        $weixinConfig->MchId = Input::get('MchId');
        $weixinConfig->PayKey = Input::get('PayKey');
        $weixinConfig->EncodingAESKey = Input::get('EncodingAESKey');
        $weixinConfig->AdminOpenId = Input::get('AdminOpenId');
        $weixinConfig->Welcom = Input::get('Welcom');
        $weixinConfig->save();

        return Redirect::to('supplier/weixin/config')->with('message', '修改成功!');
//        } else {
//            // 验证没通过就显示错误提示信息
//        }

//
//        $id = Input::get('Id');
//        $this->validate($request, [
//            'Name' => 'required|max:255',
//        ]);
//        if ($id == "") {
//            DB::table('weixin_config')->insert(Input::all());
//        } else {
//            DB::table('weixin_config')->where('Id', $id)
//                ->update(Input::all());
//        }
//        return redirect('supplier/weixin/config/', ['model' => 'weixin', 'menu' => 'config'])->with('status', '修改成功');
    }

    public static $messages = [
        'required' => '微信名称不能为空'
    ];


    public static $rules = array(
        'Name' => 'required|alpha|min:2',
        'email' => 'required|email|unique:users',
        'password' => 'required|alpha_num|between:6,12|confirmed',
        'password_confirmation' => 'required|alpha_num|between:6,12'
    );
}