<?php

namespace App\Http\Controllers\Manage;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

/**
 * 角色管理
 * @package App\Http\Controllers\Manage
 */
class RoleController extends BaseController
{
    /**
     * 主页
     */
    public function index()
    {
        $role = Role::all();


        return view('manage.system.role.index', ['model' => 'system', 'menu' => 'role', 'items' => $role]);
    }

    public function getCreate()
    {
        $role = new Role();
        $permissions = Permission::all();
        return view('manage.system.role.create', ['model' => 'system', 'menu' => 'role', 'role' => $role, 'permissions' => $permissions]);
    }

    public function postCreate(Request $request)
    {
        $role = new Role();
        $input = $request->all();
        $validator = Validator::make($input, $role->rules(), $role->messages());
        if ($validator->fails()) {
            return redirect('/manage/system/role/create')
                ->withInput()
                ->withErrors($validator);
        }
        $role->name = $request->input('name');
        $role->display_name = $request->input('display_name');
        $role->description = $request->input('description');
        $role->save();
        // $role->permissions()->sync([3, 4])->sava();
        if ($role) {
            return Redirect('/manage/system/role/permission/' . $role->id);
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function getEdit($id)
    {
        $role = Role::find($id);
        return view('manage.system.role.edit', ['model' => 'system', 'menu' => 'role', 'role' => $role]);
    }

    public function postEdit(Request $request)
    {

        $id = $request->input('id');
        $input = $request->all();
        $role = Role::find($id);

//        $validator = Validator::make($input, $role->rules(), $role->messages());
//        if ($validator->fails()) {
//            return redirect('/manage/system/role/create')
//                ->withInput()
//                ->withErrors($validator);
//        }

        $role->name = $request->input('name');
        $role->display_name = $request->input('display_name');
        $role->description = $request->input('description');
        $role->permissions()->detach([5, 4]);
        if ($role->save()) {
            return Redirect('/manage/system/role/');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }


    public function getPermission($id)
    {
        $role = Role::find($id);
        $permissions = Permission::all();
        return view('manage.system.role.permission', ['model' => 'system', 'menu' => 'role', 'role' => $role, 'permissions' => $permissions]);
    }

    public function postPermission(Request $request)
    {

        $id = $request->input('id');
        $role = Role::find($id);

        $permissionsids = $request->input('permission_id');
//
//        foreach ($role->permissions()->lists("id") as $item) {
//            $key = array_search($item, $permissions);
//            if ($key)
//                array_splice($permissions, $item, 1);
//        }

        $permissions = Array();
        foreach ($permissionsids as $item) {
            array_push($permissions, (int)$item);
        }

        if ($role->permissions()->sync($permissions)) {
            return Redirect('/manage/system/role');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function getShow($id)
    {
        $role = Role::find($id);
        return view('manage . system . role . edit', ['model' => 'system', 'menu' => 'role', 'item' => $role]);
    }


    public function getDelete($id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('item');

    }

}