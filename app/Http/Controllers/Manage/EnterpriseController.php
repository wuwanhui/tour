<?php

namespace App\Http\Controllers\Manage;

use App\Models\System_Enterprise;
use Cache;

class EnterpriseController extends BaseController
{
    /**
     * 主页
     */
    public function index()
    {
        $enterprise = System_Enterprise::all();


        return view('manage.enterprise.index', ['model' => 'enterprise', 'menu' => 'index', 'enterprises' => $enterprise]);
    }

    public function create()
    {
        $parents = System_Enterprise::all();
        return view('manage.enterprise.create', ['model' => 'enterprise', 'menu' => 'index', 'parents' => $parents]);
    }

    public function store()
    {
        $enterprise = new System_Enterprise();

        $enterprise->Name = Input::get('Name');

        if ($enterprise->save()) {
            return response()->json(array('status' => 1, 'msg' => 'ok'
            ));
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function show()
    {
        return view('manage.enterprise.show', ['model' => 'enterprise', 'menu' => 'index']);
    }

    public function edit()
    {
        return view('manage.enterprise.edit', ['model' => 'enterprise', 'menu' => 'index']);
    }

    public function update()
    {
        return view('manage.enterprise.update', ['model' => 'enterprise', 'menu' => 'index']);
    }

    public function destroy()
    {
        return view('manage.enterprise.destroy', ['model' => 'enterprise', 'menu' => 'index']);
    }

}