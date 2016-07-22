<?php

namespace App\Http\Controllers\API;

use App\Http\Facades\Base;
use App\Http\Requests;
use App\Models\Resources\Airways;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Log;

class AirwaysController extends BaseController
{

    /**
     * API首页
     *
     * 欢迎来到Laravel学院，Laravel学院致力于提供优质Laravel中文学习资源
     *
     */
    public function index(Request $request)
    {
        $query = Airways::onlyTrashed();
        $query->where('eid', Base::eid());
        if (isset($request->mobile)) {
            $query->where('mobile', $request->mobile);
        }
        $airways = $query->get();

        $this->result->setData($airways);
        return Response::json($this->result);
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
