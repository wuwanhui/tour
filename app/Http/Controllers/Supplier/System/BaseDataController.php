<?php

namespace App\Http\Controllers\Supplier\System;

use App\Http\Controllers\Supplier\BaseController;
use App\Models\System\BaseData;
use App\Models\System\BaseType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class BaseDataController extends BaseController
{
    /**
     * 主页
     */
    public function index($tid = 0)
    {
        $baseTypes = BaseType::all();
        if ($tid == 0) {
            $baseType = BaseType::first();
            $baseDatas = BaseData::orderBy('created_at', 'desc')->paginate($this->pageSize);
        } else {
            $baseType = BaseType::find($tid);
            $baseDatas = BaseData::where('tid', $tid)->paginate($this->pageSize);
        }
        return view('supplier.system.base.index', compact('baseType', 'baseTypes', 'baseDatas'), ['model' => 'system', 'menu' => 'dept']);
    }

    public function create(Request $request, $tid = 0)
    {
        try {
            $baseData = new BaseData();
            $baseType=BaseType::find($tid);

            if (!$baseType) {
                return Redirect::back()->withErrors('请选择基础数据分类！');
            }
            $baseData->tid=$tid;
            if ($request->isMethod('post')) {
                $input = Input::all();

                $validator = Validator::make($input, $baseData->editRules(), $baseData->messages());
                if ($validator->fails()) {
                    return redirect('/supplier/system/base/list/'.$tid)
                        ->withInput()
                        ->withErrors($validator);
                }
                $baseData->fill($input);
                $baseData->eid=Base::eid();
                $baseData->save();
                if ($baseData) {
                    return redirect('/supplier/system/base/list/' . $tid)->withSuccess('保存成功！');
                } else {
                    return Redirect::back()->withErrors('保存失败！');
                }

            }
            return view('supplier.system.base.create', compact('baseType', 'baseData'), ['model' => 'system', 'menu' => 'dept']);
        } catch (Exception $ex) {
            return Redirect::back()->withInput()->withErrors('保存异常！' . $ex->getMessage());
        }
    }


    public function createType(Request $request)
    {
        try {
            $baseType = new BaseType();

            if ($request->isMethod('post')) {
                $input = Input::all();

                $validator = Validator::make($input, $baseType->editRules(), $baseType->messages());
                if ($validator->fails()) {
                    return redirect('/supplier/system/base/type')
                        ->withInput()
                        ->withErrors($validator);
                }
                $baseType->fill($input);

                $baseType->save();
                if ($baseType) {
                    return redirect('/supplier/system/base/list/' . $baseType->id)->withSuccess('保存成功！');
                } else {
                    return Redirect::back()->withErrors('保存失败！');
                }

            }
            return view('supplier.system.base.type.create', compact('baseType'), ['model' => 'system', 'menu' => 'dept']);
        } catch (Exception $ex) {
            return Redirect::back()->withInput()->withErrors('保存异常！' . $ex->getMessage());
        }
    }

    public function getEdit($id)
    {
        $parents = BaseData::where("id", "!=", $id)->get();
        $dept = BaseData::find($id);
        return view('supplier.system.dept.edit', compact("parents", "dept"), ['model' => 'system', 'menu' => 'dept']);
    }


    public function delete($id)
    {
        $baseData = BaseData::find($id);
        if (!$baseData) {
            return back()->withInput()->withErrors('删除失败！数据未找到。');
        }
        DB::beginTransaction();
        $baseData->delete();
        DB::commit();
        return back()->withInput()->withSuccess('删除成功！');

    }
}