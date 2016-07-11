<?php

namespace App\Http\Controllers\Manage\System;

use App\Http\Common\ArrayUtil;
use App\Http\Controllers\Manage\BaseController;
use App\Models\System\Enterprise;
use App\Models\System\Permission;
use App\Models\System\Role;
use App\Models\System\User;
use Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

/**
 * 用户管理
 * @package App\Http\Controllers\Manage
 */
class UserController extends BaseController
{
    /**
     * 主页
     */
    public function index($eid = null)
    {
        $enterprise = null;
        if ($eid == null) {
            $users = User::orderBy('created_at', 'desc')->paginate($this->pageSize);
        } else {
            $enterprise = Enterprise::find($eid);
            $users = User::where('eid', $enterprise->id)->orderBy('created_at', 'desc')->paginate($this->pageSize);
        }

        return view('manage.system.user.index', ['model' => 'system', 'menu' => 'user', 'enterprise' => $enterprise, 'users' => $users]);
    }


    public function create(Request $request)
    {
        $user = new User();
        $enterprises = Enterprise::all();
        $roles = Role::all();
        if ($request->isMethod('post')) {
            $input = $request->all();
            $user->fill($input);
            $user->password = bcrypt($request->input('password'));
            $user->save();
            $roles = $request->input('role_id');
            $user->roles()->sync(ArrayUtil::ArrayStringToInt($roles));
            if ($user) {
                return Redirect('/manage/system/user/');
            } else {
                return Redirect::back()->withInput()->withErrors('保存失败！');
            }
        }

        return view('manage.system.user.create', compact('user', 'enterprises', 'roles'), ['model' => 'system', 'menu' => 'user']);
    }


    public function getEdit($id)
    {
        $user = User::find($id);
        $enterprises = Enterprise::all();
        $roles = Role::all();
        return view('manage.system.user.edit', compact("user", "enterprises", "roles"), ['model' => 'system', 'menu' => 'user']);
    }

    public function postEdit(Request $request, $id)
    {
        $user = User::find($id);
        $user->eid = $request->input('eid');
        $user->name = $request->input('name');
        $validator = Validator::make($user->toArray(), $user->editRules(), $user->messages());
        if ($validator->fails()) {
            return redirect('/manage/system/user/edit/' . $id)
                ->withInput()
                ->withErrors($validator);
        }
        $password = $request->input('password');
        if ($password) {
            $user->password = bcrypt($request->input('password'));
        }
        $roles = $request->input('role_id');
        $user->save();
        if ($roles == null) {
            $user->roles()->detach();
        } else {
            $user->roles()->sync(ArrayUtil::ArrayStringToInt($roles));
        }
        if ($user) {
            return Redirect('/manage/system/user/');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }


    public
    function getPermission($id)
    {
        $user = User::find($id);
        $permissions = Permission::all();
        return view('manage.system.user.permission', ['model' => 'system', 'menu' => 'user', 'user' => $user, 'permissions' => $permissions]);
    }

    public
    function postPermission(Request $request)
    {

        $id = $request->input('id');
        $user = User::find($id);

        $permissionsids = $request->input('permission_id');


        if ($user->permissions()->sync(ArrayUtil::ArrayStringToInt($permissionsids))) {
            return Redirect('/manage/system/user');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public
    function getShow($id)
    {
        $user = User::find($id);
        return view('manage . system . user . edit', ['model' => 'system', 'menu' => 'user', 'item' => $user]);
    }


    public
    function getDelete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('item');

    }

}