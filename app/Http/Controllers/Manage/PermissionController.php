<?php

namespace App\Http\Controllers\Manage;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

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
        
        $permissions = Permission::where([])->orderBy('created_at', 'desc')->paginate($this->pageSize);
        return view('manage.system.permission.index', ['model' => 'system', 'menu' => 'permission', 'permissions' => $permissions]);
    }

    public function getCreate()
    {
        $permission = new Permission();
        return view('manage.system.permission.create', ['model' => 'system', 'menu' => 'permission', 'permission' => $permission]);
    }

    public function postCreate(Request $request)
    {
        $permission = new Permission();
        $input = $request->all();

        $validator = Validator::make($input, $permission->rules(), $permission->messages());
        if ($validator->fails()) {
            return redirect('/manage/system/permission/create')
                ->withInput()
                ->withErrors($validator);
        }

        if (Permission::create($input)) {
            return redirect('/manage/system/permission')
                ->withSuccess("新增成功");
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function getEdit($id)
    {

        $permission = Permission::find($id);
        return view('manage.system.permission.edit', ['model' => 'system', 'menu' => 'permission', 'permission' => $permission]);
    }

    public function postEdit(Request $request)
    {

        $id = $request->input('id');
        $permission = Permission::find($id);
        if ($permission == null) {
            return Redirect::back()->withInput()->withErrors('修改失败！');
        }

        $input = $request->all();
        $validator = Validator::make($input, $permission->rules(), $permission->messages());
        if ($validator->fails()) {
            return redirect('/manage/system/permission/create')
                ->withInput()
                ->withErrors($validator);
        }

        if ($permission->update($input)) {
            return Redirect('/manage/system/permission');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function getShow($id)
    {
        $permission = Permission::find($id);
        return view('manage.system.permission.edit', ['model' => 'system', 'menu' => 'permission', 'permission' => $permission]);
    }


    public function getDelete($id)
    {
        $permission = Permission::find($id);
        $permission->delete();
        return redirect()->route('permission');

    }


}