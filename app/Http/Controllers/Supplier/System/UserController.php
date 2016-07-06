<?php

namespace App\Http\Controllers\Supplier\System;

use App\Http\Controllers\Manage\BaseController;
use App\Models\System\Enterprise;
use App\Models\System\Permission;
use App\Models\System\Role;
use App\Models\System\User;
use ArrayUtil;
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
    public function index()
    {
        $enterprise = Enterprise::find(Auth::user()->eid);
        $users = User::where('eid', $enterprise->id)->orderBy('created_at', 'desc')->paginate($this->pageSize);
        return view('supplier.system.user.index', ['model' => 'system', 'menu' => 'user', 'enterprise' => $enterprise, 'users' => $users]);
    }


    public function create(Request $request)
    {
        try {
            $user = new User();
            $roles = Role::all();
            if ($request->isMethod('post')) {
                $input = Input::all();

                $validator = Validator::make($input, $user->createRules(), $user->messages());
                if ($validator->fails()) {
                    return redirect('/supplier/system/enterprise')
                        ->withInput()
                        ->withErrors($validator);
                }
                $user->fill($input);
                $user->eid = Auth::user()->eid;
                $user->save();
                if ($user) {
                    return redirect('/supplier/system/user/list/')->withSuccess('保存成功！');
                } else {
                    return Redirect::back()->withErrors('保存失败！');
                }
            }
            return view('supplier.system.user.create', compact('user', 'roles'), ['model' => 'system', 'menu' => 'enterprise']);
        } catch (Exception $ex) {
            return Redirect::back()->withInput()->withErrors('异常！' . $ex->getMessage());
        }
    }

    public
    function postCreate(Request $request)
    {
        $user = new User();
        $input = $request->all();
        $validator = Validator::make($input, $user->rules(), $user->messages());
        if ($validator->fails()) {
            return redirect('/supplier/system/user/create')
                ->withInput()
                ->withErrors($validator);
        }
        $user->enterprise_id = $request->input('enterprise_id');
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));

        $roles = Array();
        foreach ($roles as $item) {
            array_push($roles, (int)$item);
        }

        $user->save();
        $user->roles()->sync($roles);

        if ($user) {
            return Redirect('/supplier/system/user/');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public
    function getEdit($id)
    {
        $user = User::find($id);
        $enterprises = Enterprise::all();
        $roles = Role::all();
        return view('supplier.system.user.edit', compact("user", "enterprises", "roles"), ['model' => 'system', 'menu' => 'user']);
    }

    public
    function postEdit(Request $request)
    {

        $id = $request->input('id');
        $input = $request->all();
        $user = User::find($id);

//        $validator = Validator::make($input, $user->rules(), $user->messages());
//        if ($validator->fails()) {
//            return redirect('/supplier/system/user/create')
//                ->withInput()
//                ->withErrors($validator);
//        }

        $user->name = $request->input('name');
        $user->display_name = $request->input('display_name');
        $user->description = $request->input('description');
        $user->permissions()->detach([5, 4]);
        if ($user->save()) {
            return Redirect('/supplier/system/user/');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }


    public
    function getPermission($id)
    {
        $user = User::find($id);
        $permissions = Permission::all();
        return view('supplier.system.user.permission', ['model' => 'system', 'menu' => 'user', 'user' => $user, 'permissions' => $permissions]);
    }

    public
    function postPermission(Request $request)
    {

        $id = $request->input('id');
        $user = User::find($id);

        $permissionsids = $request->input('permission_id');


        if ($user->permissions()->sync(ArrayUtil::ArrayStringToInt($permissionsids))) {
            return Redirect('/supplier/system/user');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public
    function getShow($id)
    {
        $user = User::find($id);
        return view('supplier . system . user . edit', ['model' => 'system', 'menu' => 'user', 'item' => $user]);
    }


    public
    function getDelete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('item');

    }

}