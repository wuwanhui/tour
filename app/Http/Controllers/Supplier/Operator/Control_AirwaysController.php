<?php

namespace App\Http\Controllers\Supplier\Operator;

use App\Http\Controllers\Supplier\BaseController;
use App\Http\Facades\Base;
use App\Models\Operator\Control_Airways;
use App\Models\Resources\Line;
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
        $airways = Control_Airways::Eid()->orderBy('created_at', 'desc')->paginate($this->pageSize);
        return view('supplier.operator.control.airways.index', compact('airways'));
    }


    public function create(Request $request)
    {
        try {
            $control_airways = new Control_Airways();
            $linkid = $request->linkid;
            if ($linkid) {
                $control_airways->line_id = $linkid;

            } else {
                $lines = Line::Eid()->ControlAirways(0)->orderBy('created_at', 'desc')->paginate($this->pageSize);
            }
            $lines = Line::Eid()->ControlAirways(0)->orderBy('created_at', 'desc')->paginate($this->pageSize);
            if ($request->isMethod('post')) {
                $input = Input::all();

                $validator = Validator::make($input, $control_airways->createRules(), $control_airways->messages());
                if ($validator->fails()) {
                    return redirect('/supplier/operator/control/airways/create')
                        ->withInput()
                        ->withErrors($validator);
                }
                $control_airways->fill($input);
                $control_airways->eid = Base::eid();
                $control_airways->createid = Base::uid();
                $arrayDay = explode(',', $control_airways->start_date);
                foreach ($arrayDay as $item) {
                    $control_airways->start_date = $item;
                    $control_airways->save();
                }
                if ($control_airways) {
                    return redirect('/supplier/operator/control/airways/')->withSuccess('保存成功！');
                } else {
                    return Redirect::back()->withErrors('保存失败！');
                }
            }
            return view('supplier.operator.control.airways.create', compact('lines', 'airways'));
        } catch (Exception $ex) {
            return Redirect::back()->withInput()->withErrors('异常！' . $ex->getMessage());
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $control_airways = Control_Airways::find($id);
            if (!$control_airways) {
                return Redirect::back()->withErrors('数据加载失败！');
            }
            if ($request->isMethod('post')) {
                $input = Input::all();

                $validator = Validator::make($input, $control_airways->editRules(), $control_airways->messages());
                if ($validator->fails()) {
                    return redirect('/supplier/operator/control/airways/edit/' . $id)
                        ->withInput()
                        ->withErrors($validator);
                }
                $control_airways->fill($input);
                $control_airways->editid = Base::uid();
                $control_airways->save();
                if ($control_airways) {
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
        $control_airways = Control_Airways::find($id);
        if ($control_airways->delete()) {
            return redirect('/supplier/operator/control/airways/')->withSuccess('删除成功！');
        } else {
            return Redirect::back()->withErrors('数据加载失败！');
        }


    }

}