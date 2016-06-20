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
        $enterprise = Enterprise::all();
        return view('manage.system.enterprise.index', ['model' => 'system', 'menu' => 'enterprise', 'enterprises' => $enterprise]);
    }

    public function getCreate()
    {
        $parents = Enterprise::all();
        return view('manage.system.enterprise.create', ['model' => 'system', 'menu' => 'enterprise', 'parents' => $parents]);
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
        $enterprise = Enterprise::find($id);
        return view('manage.system.enterprise.edit', ['model' => 'system', 'menu' => 'enterprise', 'enterprise' => $enterprise]);
    }

    public function postEdit(Request $request)
    {

        $id = $request->input('id');
        print_r(Input::only('id'));
        $input = $request->all();
        $enterprise = Enterprise::find($id);

//        $validator = Validator::make($input, $enterprise->rules(), $enterprise->messages());
//        if ($validator->fails()) {
//            return redirect('/manage/system/enterprise/create')
//                ->withInput()
//                ->withErrors($validator);
//        }

        $enterprise->name = $request->input('name');
        $enterprise->display_name = $request->input('display_name');
        $enterprise->description = $request->input('description');
        $enterprise->permissions()->detach([5, 4]);
        if ($enterprise->save()) {
            return Redirect('/manage/system/enterprise/');
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
        return redirect()->route('item');

    }
}