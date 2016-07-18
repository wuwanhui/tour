<?php

namespace App\Http\Controllers\Supplier\Operator;

use App\Http\Controllers\Supplier\BaseController;
use App\Http\Facades\Base;
use App\Models\Operator\Control_Airways;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Mockery\CountValidator\Exception;

/**
 * 航空控位
 * @package App\Http\Controllers\Supplier\Operator
 */
class Control_AirwaysController extends BaseController
{

    /**
     * 主页
     */
    public function index()
    {
        $airways = Control_Airways::where('eid', Base::eid())->orderBy('created_at', 'desc')->paginate($this->pageSize);
        return view('supplier.operator.control.airways.index', compact('airways'));
    }


    public function create(Request $request)
    {
        try {
            $airways = new Control_Airways();
            if ($request->isMethod('post')) {
                $input = Input::all();

                $validator = Validator::make($input, $airways->createRules(), $airways->messages());
                if ($validator->fails()) {
                    return redirect('/supplier/operator/control/airways/create')
                        ->withInput()
                        ->withErrors($validator);
                }
                $airways->fill($input);
                $airways->eid = Base::eid();
                $airways->createid = Base::uid();
                $airways->save();
                if ($airways) {
                    return redirect('/supplier/operator/control/airways/')->withSuccess('保存成功！');
                } else {
                    return Redirect::back()->withErrors('保存失败！');
                }
            }
            return view('supplier.operator.control.airways.create', compact('airways'));
        } catch (Exception $ex) {
            return Redirect::back()->withInput()->withErrors('异常！' . $ex->getMessage());
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $airways = Control_Airways::find($id);
            if (!$airways) {
                return Redirect::back()->withErrors('数据加载失败！');
            }
            if ($request->isMethod('post')) {
                $input = Input::all();

                $validator = Validator::make($input, $airways->editRules(), $airways->messages());
                if ($validator->fails()) {
                    return redirect('/supplier/operator/control/airways/edit/' . $id)
                        ->withInput()
                        ->withErrors($validator);
                }
                $airways->fill($input);
                $airways->editid = Base::uid();
                $airways->save();
                if ($airways) {
                    return redirect('/supplier/operator/control/airways/')->withSuccess('保存成功！');
                } else {
                    return Redirect::back()->withErrors('保存失败！');
                }
            }
            return view('supplier.operator.control.airways.edit', compact('airways'));
        } catch (Exception $ex) {
            return Redirect::back()->withInput()->withErrors('异常！' . $ex->getMessage());
        }
    }


    public function delete($id)
    {
        $airways = Control_Airways::find($id);
        if ($airways->delete()) {
            return redirect('/supplier/operator/control/airways/')->withSuccess('删除成功！');
        } else {
            return Redirect::back()->withErrors('数据加载失败！');
        }


    }

}