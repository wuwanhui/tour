<?php

namespace App\Http\Controllers\Supplier\System;

use App\Http\Controllers\Manage\BaseController;
use App\Models\System\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class ConfigController extends BaseController
{
    /**
     * 主页
     */

    public function index(Request $request)
    {

        $config = Config::where('eid', Auth::user()->eid)->first();
        if ($config == null) {
            $config = new Config();
            $config->eid = Auth::user()->eid;
        }
        if ($request->isMethod('post')) {
            $input = Input::all();
            $validator = Validator::make($input, $config->editRules(), $config->messages());
            if ($validator->fails()) {
                return redirect('/supplier/system/config')
                    ->withInput()
                    ->withErrors($validator);
            }
            $config->fill($input);
            $config->save();
            return Redirect::back()->with('message', '保存成功！');
        }

        return view('supplier.system.config.edit', compact("config"), ['model' => 'system', 'menu' => 'config']);

    }


}