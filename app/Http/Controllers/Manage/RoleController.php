<?php

namespace App\Http\Controllers\Manage;

use App\Models\Role;


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


        return view('manage.system.role.index', ['model' => 'system', 'menu' => 'role', 'roles' => $role]);
    }

    public function create()
    {
        $role = new Role();
        return view('manage.system.role.create', ['model' => 'system', 'menu' => 'role', 'role' => $role]);
    }

    public function store()
    {
        $role = new Role();

        $role->Name = Input::get('Name');

        if ($role->save()) {
            return response()->json(array('status' => 1, 'msg' => 'ok'
            ));
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function show()
    {
        return view('manage.system.role.show', ['model' => 'system', 'menu' => 'role']);
    }

    public function edit()
    {
        return view('manage.system.role.edit', ['model' => 'system', 'menu' => 'role']);
    }

    public function update()
    {
        return view('manage.system.role.update', ['model' => 'system', 'menu' => 'role']);
    }

    public function destroy()
    {
        return view('manage.system.role.destroy', ['model' => 'system', 'menu' => 'role']);
    }

}