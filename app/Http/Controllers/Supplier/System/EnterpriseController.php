<?php

namespace App\Http\Controllers\Supplier\System;

use App\Http\Controllers\Manage\BaseController;
use App\Models\System\Enterprise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Mockery\CountValidator\Exception;

class EnterpriseController extends BaseController
{
    /**
     * 主页
     */

    public function index(Request $request)
    {
        try {
            $enterprise = Auth::user()->enterprise;

            if ($request->isMethod('post')) {
                $input = Input::all();
                $validator = Validator::make($input, $enterprise->editRules(), $enterprise->messages());
                if ($validator->fails()) {
                    return redirect('/supplier/system/enterprise')
                        ->withInput()
                        ->withErrors($validator);
                }
                $enterprise->fill($input);
                $enterprise->save();
                return Redirect::back()->with('message', '保存成功！');
            }

            return view('supplier.system.enterprise.edit', compact("enterprise"), ['model' => 'system', 'menu' => 'enterprise']);
        } catch (Exception $ex) {
            return Redirect::back()->withInput()->withErrors('保存失败！' . $ex->getMessage());
        }
    }


}