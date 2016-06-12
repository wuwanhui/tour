<?php

namespace App\Http\Controllers\Manage;

use App\Models\User;
use Cache;

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
        $user = User::all();


        return view('manage.system.user.index', ['model' => 'user', 'menu' => 'index', 'users' => $user]);
    }

    public function create()
    {
        $parents = User::all();
        return view('manage.system.user.create', ['model' => 'user', 'menu' => 'index', 'parents' => $parents]);
    }

    public function store()
    {
        $user = new User();

        $user->Name = Input::get('Name');

        if ($user->save()) {
            return response()->json(array('status' => 1, 'msg' => 'ok'
            ));
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function show()
    {
        return view('manage.system.user.show', ['model' => 'user', 'menu' => 'index']);
    }

    public function edit()
    {
        return view('manage.system.user.edit', ['model' => 'user', 'menu' => 'index']);
    }

    public function update()
    {
        return view('manage.system.user.update', ['model' => 'user', 'menu' => 'index']);
    }

    public function destroy()
    {
        return view('manage.system.user.destroy', ['model' => 'user', 'menu' => 'index']);
    }

}