<?php

namespace App\Http\Controllers\Supplier\Resources;

use App\Http\Controllers\Supplier\BaseController;
use App\Http\Facades\Base;
use App\Models\Resources\Airways;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Mockery\CountValidator\Exception;

class AirwaysController extends BaseController
{

    /**
     * 主页
     */
    public function index(Request $request)
    {

        $airways = Airways::onlyTrashed()->where('eid', Base::eid())->orderBy('created_at', 'desc')->paginate($this->pageSize);
        if (isset($request->json)) {
            return Response::json($airways);
        }
        return view('supplier.resources.airways.index', compact('airways'));
    }


    public function create(Request $request)
    {
        try {
            $airways = new Airways();
            if ($request->isMethod('post')) {
                $input = Input::all();

                $validator = Validator::make($input, $airways->createRules(), $airways->messages());
                if ($validator->fails()) {
                    return redirect('/supplier/resources/airways/create')
                        ->withInput()
                        ->withErrors($validator);
                }
                $airways->fill($input);
                $airways->eid = Base::eid();
                $airways->createid = Base::uid();
                $airways->save();
                if ($airways) {
                    return redirect('/supplier/resources/airways/')->withSuccess('保存成功！');
                } else {
                    return Redirect::back()->withErrors('保存失败！');
                }
            }
            return view('supplier.resources.airways.create', compact('airways'));
        } catch (Exception $ex) {
            return Redirect::back()->withInput()->withErrors('异常！' . $ex->getMessage());
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $airways = Airways::find($id);
            if (!$airways) {
                return Redirect::back()->withErrors('数据加载失败！');
            }
            if ($request->isMethod('post')) {
                $input = Input::all();

                $validator = Validator::make($input, $airways->editRules(), $airways->messages());
                if ($validator->fails()) {
                    return redirect('/supplier/resources/airways/edit/' . $id)
                        ->withInput()
                        ->withErrors($validator);
                }
                $airways->fill($input);
                $airways->editid = Base::uid();
                $airways->save();
                if ($airways) {
                    return redirect('/supplier/resources/airways/')->withSuccess('保存成功！');
                } else {
                    return Redirect::back()->withErrors('保存失败！');
                }
            }
            return view('supplier.resources.airways.edit', compact('airways'));
        } catch (Exception $ex) {
            return Redirect::back()->withInput()->withErrors('异常！' . $ex->getMessage());
        }
    }


    public function delete($id)
    {
        $airways = Airways::find($id);
        if ($airways->delete()) {
            return redirect('/supplier/resources/airways/')->withSuccess('删除成功！');
        } else {
            return Redirect::back()->withErrors('数据加载失败！');
        }


    }

}