<?php

namespace App\Http\Controllers\Manage;

use App\Models\Enterprise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class EnterpriseController extends BaseController
{
    /**
     * 主页
     */
    public function index()
    {
        $enterprises = Enterprise::orderBy('created_at', 'desc')->paginate($this->pageSize);
        return view('manage.system.enterprise.index', compact("enterprises"), ['model' => 'system', 'menu' => 'enterprise']);
    }

    public function getCreate()
    {
        $parents = Enterprise::all();
        $enterprise = new Enterprise();
        return view('manage.system.enterprise.create', compact("enterprise", "parents"), ['model' => 'system', 'menu' => 'enterprise']);
    }

    public function postCreate(Request $request)
    {
        $enterprise = new Enterprise();
        $input = $request->except('_token');
        $validator = Validator::make($input, $enterprise->rules(), $enterprise->messages());
        if ($validator->fails()) {
            return redirect('/manage/system/enterprise/create')
                ->withInput()
                ->withErrors($validator);
        }

        if (DB::table('enterprise')->insert($input)) {
            return Redirect('/manage/system/enterprise/' . $enterprise->id);
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function getEdit($id)
    {
        $parents = Enterprise::where("id", "!=", $id)->get();
        $enterprise = Enterprise::find($id);
        return view('manage.system.enterprise.edit', compact("parents", "enterprise"), ['model' => 'system', 'menu' => 'enterprise']);
    }

    public function postEdit(Request $request)
    {
        $id = $request->input('id');
        $enterprise = Enterprise::find($id);
        $input = $request->except(['id', '_token']);
        $validator = Validator::make($input, $enterprise->rules(), $enterprise->messages());
        if ($validator->fails()) {
            return redirect('/manage/system/enterprise/create')
                ->withInput()
                ->withErrors($validator);
        }

        if (DB::table('enterprise')->where('id', $id)->update($input)) {
            return Redirect('/manage/system/enterprise/' . $enterprise->id);
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }

    }


    public function getPermission($id)
    {
        $enterprise = Enterprise::find($id);
        $permissions = Permission::all();
        return view('manage.system.enterprise.permission', ['model' => 'system', 'menu' => 'enterprise', 'enterprise' => $enterprise, 'permissions' => $permissions]);
    }

    public function postPermission(Request $request)
    {

        $id = $request->input('id');
        $enterprise = Enterprise::find($id);

        $permissionsids = $request->input('permission_id');
//
//        foreach ($enterprise->permissions()->lists("id") as $item) {
//            $key = array_search($item, $permissions);
//            if ($key)
//                array_splice($permissions, $item, 1);
//        }

        $permissions = Array();
        foreach ($permissionsids as $item) {
            array_push($permissions, (int)$item);
        }

        if ($enterprise->permissions()->sync($permissions)) {
            return Redirect('/manage/system/enterprise');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function getShow($id)
    {
        $enterprise = Enterprise::find($id);
        return view('manage . system . enterprise . edit', ['model' => 'system', 'menu' => 'enterprise', 'item' => $enterprise]);
    }


    public function getDelete($id)
    {
        $enterprise = Enterprise::find($id);
        $enterprise->delete();
        return back()->withInput()->withErrors('删除成功！');

    }
}