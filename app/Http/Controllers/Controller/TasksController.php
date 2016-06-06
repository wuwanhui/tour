<?php

namespace App\Http\Controllers;

use Cache;
use App\Http\Controllers\Controller;

class TasksController extends Controller
{
    /**
     * 为指定用户显示属性
     *
     * @param  int $id
     * @return Response
     */
    public function showProfile($id)
    {
        $user = Cache::get('user:' . $id);

        return view('profile', ['user' => $user]);
    }
}