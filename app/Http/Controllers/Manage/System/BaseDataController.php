<?php

namespace App\Http\Controllers\Manage\System;

use App\Http\Controllers\Manage\BaseController;
use App\Models\System\BaseData;
use App\Models\System\BaseType;
use App\Models\System\Dept;
use App\Models\System\User;
use App\Models\Weixin\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $baseTypes = BaseType::where('eid', Auth::user()->eid)->orderBy('created_at', 'desc');
        $baseDatas = BaseData::where('eid', Auth::user()->eid)->orderBy('created_at', 'desc');
        if ($tid != 0) {

            $baseDatas = $baseDatas->where('tid', $tid)->paginate($this->pageSize)->get();
        }
        return view('manage.system.base.index', compact('baseTypes', 'baseDatas'), ['model' => 'system', 'menu' => 'dept']);
    }

    public function create(Request $request, $pid = 0)
    {
        try {
            $dept = new Dept();
            if ($pid != 0) {
                $parents = Dept::find($pid);
            }
            $users = User::where('eid', Auth::user()->eid);
            if ($request->isMethod('post')) {
                $input = Input::all();

                $validator = Validator::make($input, $dept->editRules(), $dept->messages());
                if ($validator->fails()) {
                    return redirect('/manage/system/dept')
                        ->withInput()
                        ->withErrors($validator);
                }
                $dept->fill($input);
                $dept->pid = $pid;
                $dept->eid = Auth::user()->eid;
                $dept->save();
                if ($dept) {
                    return redirect('/manage/system/dept/list/' . $pid)->withSuccess('保存成功！');
                } else {
                    return Redirect::back()->withErrors('保存失败！');
                }

            }
            return view('manage.system.dept.create', compact('dept', 'parents', 'users'), ['model' => 'system', 'menu' => 'dept']);
        } catch (Exception $ex) {
            return Redirect::back()->withInput()->withErrors('保存异常！' . $ex->getMessage());
        }
    }

    public function postCreate(Request $request)
    {
        $dept = new Dept();
        $input = Input::all();
        $validator = Validator::make($input, $dept->createRules(), $dept->messages());
        if ($validator->fails()) {
            return redirect('/manage/system/dept/create')
                ->withInput()
                ->withErrors($validator);
        }
        $dept->fill($input);
        $config = new Config();
        $config->name = $dept->short_name;
        DB::beginTransaction();
        $dept->save();
        $dept->config()->save($config);
        DB::commit();
        if ($dept) {
            return Redirect('/manage/system/dept/')->withSuccess('新增成功!');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function getEdit($id)
    {
        $parents = Dept::where("id", "!=", $id)->get();
        $dept = Dept::find($id);
        return view('manage.system.dept.edit', compact("parents", "dept"), ['model' => 'system', 'menu' => 'dept']);
    }

    public function postEdit(Request $request)
    {
        $id = $request->input('id');
        $dept = Dept::find($id);
        $validator = Validator::make(Input::all(), $dept->editRules(), $dept->messages());
        if ($validator->fails()) {
            return redirect('/manage/system/dept/create')
                ->withInput()
                ->withErrors($validator);
        }
        $dept->fill(Input::all());
        DB::beginTransaction();
        $dept->save();
        if ($dept->config == null) {
            $config = new Config();
            $config->name = $dept->short_name;
            $dept->config()->save($config);
        }
        DB::commit();


        if ($dept) {
            return Redirect('/manage/system/dept/list/' . $dept->id);
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }

    }


    public function getPermission($id)
    {
        $dept = Dept::find($id);
        $permissions = Permission::all();
        return view('manage.system.dept.permission', ['model' => 'system', 'menu' => 'dept', 'dept' => $dept, 'permissions' => $permissions]);
    }

    public function postPermission(Request $request)
    {

        $id = $request->input('id');
        $dept = Dept::find($id);

        $permissionsids = $request->input('permission_id');
//
//        foreach ($dept->permissions()->lists("id") as $item) {
//            $key = array_search($item, $permissions);
//            if ($key)
//                array_splice($permissions, $item, 1);
//        }

        $permissions = Array();
        foreach ($permissionsids as $item) {
            array_push($permissions, (int)$item);
        }

        if ($dept->permissions()->sync($permissions)) {
            return Redirect('/manage/system/dept');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function getShow($id)
    {
        $dept = Dept::find($id);
        return view('manage . system . dept . edit', ['model' => 'system', 'menu' => 'dept', 'item' => $dept]);
    }


    public function getDelete($id)
    {
        $dept = Dept::find($id);
        if (count($dept->users) > 0) {
            return back()->withInput()->withErrors('删除失败！请先删除企业下用户。');
        }
        DB::beginTransaction();
        $dept->config()->delete();
        $dept->delete();
        DB::commit();

        return back()->withInput()->withSuccess('删除成功！');

    }
}