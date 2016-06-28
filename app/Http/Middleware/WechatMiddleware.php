<?php

namespace App\Http\Middleware;

use Closure;

class WechatMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // 如果取不到用户的cookie，跳转到用户登陆页面
//       return redirect('login');
        // $request->test = "WeixinMiddleware";
        // 获取到微信请求里包含的几项内容
        $signature = $request->input('signature');
        $timestamp = $request->input('timestamp');
        $nonce = $request->input('nonce');

        // ninghao 是我在微信后台手工添加的 token 的值
        $token = env('WEIXIN_TOKEN');

        // 加工出自己的 signature
        $our_signature = array($token, $timestamp, $nonce);
        sort($our_signature, SORT_STRING);
        $our_signature = implode($our_signature);
        $our_signature = sha1($our_signature);

        // 用自己的 signature 去跟请求里的 signature 对比
        if ($our_signature != $signature) {
           // echo('未知来源');
            // return redirect('login');
            //return false;
        }
        return $next($request);
    }
}
