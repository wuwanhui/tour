<?php

namespace App\Http\Controllers\Manage;

use App\Models\Permission;
use Cache;
use Illuminate\Http\Request;

/**
 * 权限管理
 * @package App\Http\Controllers\Manage
 */
class PermissionController extends BaseController
{
    /**
     * 主页
     */
    public function index(Request $request)
    {
        if ($request->user()) {
            return ("用户已进入");
        } else {
            return ("用户未进入");

        }

        $permission = Permission::all();


        return view('manage.system.permission.index', ['model' => 'system', 'menu' => 'permission']) . with('permissions', $permission);
    }

    public function create()
    {
        $parents = Permission::all();
        return view('manage.system.permission.create', ['model' => 'system', 'menu' => 'permission']) . with('permissions', $parents);
    }

    public function store()
    {
        $permission = new Permission();

        $permission->Name = Input::get('Name');

        if ($permission->save()) {
            return response()->json(array('status' => 1, 'msg' => 'ok'
            ));
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function show()
    {
        return view('manage.system.permission.show', ['model' => 'system', 'menu' => 'permission']);
    }

    public function edit()
    {
        return view('manage.system.permission.edit', ['model' => 'system', 'menu' => 'permission']);
    }

    public function update()
    {
        return view('manage.system.permission.update', ['model' => 'system', 'menu' => 'permission']);
    }

    public function destroy()
    {
        return view('manage.system.permission.destroy', ['model' => 'system', 'menu' => 'permission']);
    }

}