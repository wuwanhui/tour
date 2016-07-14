<?php

namespace App\Http\Controllers\Supplier\Resources;

use App\Http\Controllers\Supplier\BaseController;
use App\Http\Facades\Base;
use App\Models\Resources\Intourist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Mockery\CountValidator\Exception;

class IntouristController extends BaseController
{

    /**
     * 主页
     */
    public function index()
    {
        $intourists = Intourist::where('eid', Base::eid())->orderBy('created_at', 'desc')->paginate($this->pageSize);
        return view('supplier.resources.intourist.index', compact('intourists'));
    }


    public function create(Request $request)
    {
        try {
            $intourist = new Intourist();
            if ($request->isMethod('post')) {
                $input = Input::all();

                $validator = Validator::make($input, $intourist->createRules(), $intourist->messages());
                if ($validator->fails()) {
                    return redirect('/supplier/resources/intourist/create')
                        ->withInput()
                        ->withErrors($validator);
                }
                $intourist->fill($input);
                $intourist->eid = Base::eid();
                $intourist->createid = Base::uid();
                $intourist->save();
                if ($intourist) {
                    return redirect('/supplier/resources/intourist/')->withSuccess('保存成功！');
                } else {
                    return Redirect::back()->withErrors('保存失败！');
                }
            }
            return view('supplier.resources.intourist.create', compact('intourist'));
        } catch (Exception $ex) {
            return Redirect::back()->withInput()->withErrors('异常！' . $ex->getMessage());
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $intourist = Intourist::find($id);
            if (!$intourist) {
                return Redirect::back()->withErrors('数据加载失败！');
            }
            if ($request->isMethod('post')) {
                $input = Input::all();

                $validator = Validator::make($input, $intourist->editRules(), $intourist->messages());
                if ($validator->fails()) {
                    return redirect('/supplier/resources/intourist/edit/' . $id)
                        ->withInput()
                        ->withErrors($validator);
                }
                $intourist->fill($input);
                $intourist->editid = Base::uid();
                $intourist->save();
                if ($intourist) {
                    return redirect('/supplier/resources/intourist/')->withSuccess('保存成功！');
                } else {
                    return Redirect::back()->withErrors('保存失败！');
                }
            }
            return view('supplier.resources.intourist.edit', compact('intourist'));
        } catch (Exception $ex) {
            return Redirect::back()->withInput()->withErrors('异常！' . $ex->getMessage());
        }
    }


    public function delete($id)
    {
        $intourist = Intourist::find($id);
        if ($intourist->delete()) {
            return redirect('/supplier/resources/intourist/')->withSuccess('删除成功！');
        } else {
            return Redirect::back()->withErrors('数据加载失败！');
        }


    }

}