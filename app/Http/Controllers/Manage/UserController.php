<?php

namespace App\Http\Controllers\Manage;

use App\Models\Enterprise;
use App\Models\Role;
use App\Models\User;
use ArrayUtil;
use Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            $users = User::all();
        } else {
            $enterprise = Enterprise::find($eid);
            $users = DB::table('users')->where('enterprise_id', $enterprise->id)->get();

        }
        return view('manage.system.user.index', ['model' => 'system', 'menu' => 'user', 'enterprise' => $enterprise, 'users' => $users]);
    }


    public function getCreate()
    {
        $user = new User();
        $enterprises = Enterprise::all();
        $roles = Role::all();
        return view('manage.system.user.create', ['model' => 'system', 'menu' => 'user', 'user' => $user, 'roles' => $roles, 'enterprises' => $enterprises]);
    }

    public function postCreate(Request $request)
    {
        $user = new User();
        $input = $request->all();
        $validator = Validator::make($input, $user->rules(), $user->messages());
        if ($validator->fails()) {
            return redirect('/manage/system/user/create')
                ->withInput()
                ->withErrors($validator);
        }
        $user->enterprise_id = $request->input('enterprise_id');
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();
        // $user->permissions()->sync([3, 4])->sava();
        if ($user) {
            return Redirect('/manage/system/user/');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function getEdit($id)
    {
        $user = User::find($id);
        return view('manage.system.user.edit', ['model' => 'system', 'menu' => 'user', 'user' => $user]);
    }

    public function postEdit(Request $request)
    {

        $id = $request->input('id');
        $input = $request->all();
        $user = User::find($id);

//        $validator = Validator::make($input, $user->rules(), $user->messages());
//        if ($validator->fails()) {
//            return redirect('/manage/system/user/create')
//                ->withInput()
//                ->withErrors($validator);
//        }

        $user->name = $request->input('name');
        $user->display_name = $request->input('display_name');
        $user->description = $request->input('description');
        $user->permissions()->detach([5, 4]);
        if ($user->save()) {
            return Redirect('/manage/system/user/');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }


    public function getPermission($id)
    {
        $user = User::find($id);
        $permissions = Permission::all();
        return view('manage.system.user.permission', ['model' => 'system', 'menu' => 'user', 'user' => $user, 'permissions' => $permissions]);
    }

    public function postPermission(Request $request)
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

    public function getShow($id)
    {
        $user = User::find($id);
        return view('manage . system . user . edit', ['model' => 'system', 'menu' => 'user', 'item' => $user]);
    }


    public function getDelete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('item');

    }

}