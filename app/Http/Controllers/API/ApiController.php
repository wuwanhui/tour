<?php

namespace App\Http\Controllers\API;

use App\Http\Requests;
use Illuminate\Support\Facades\Response;
use Log;

class ApiController extends BaseController
{
    /**
     * API首页
     *
     * 欢迎来到Laravel学院，Laravel学院致力于提供优质Laravel中文学习资源
     *
     */
    public function index()
    {
        return Response::json('asdf');
    }

    public function create()
    {
    }

    public function store()
    {
    }

    public function show()
    {
    }

    public function edit()
    {
    }

    public function update()
    {
    }

    public function destroy()
    {
    }
}
