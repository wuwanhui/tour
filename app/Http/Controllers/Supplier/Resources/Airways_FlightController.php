<?php

namespace App\Http\Controllers\Supplier\Resources;

use App\Http\Controllers\Supplier\BaseController;
use App\Http\Facades\Base;
use App\Models\Resources\Airways;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Mockery\CountValidator\Exception;

class Airways_FlightController extends BaseController
{

    /**
     * 主页
     */
    public function index($aid = 0)
    {
        if ($aid == 0) {
            $flights = Airways::where('eid', Base::eid())->orderBy('created_at', 'desc')->paginate($this->pageSize);
        } else {
            $flights = Airways::where('eid', Base::eid())->where('airways_id', $aid)->orderBy('created_at', 'desc')->paginate($this->pageSize);
        }
        return view('supplier.resources.airways.flight.index', compact('flights'));
    }


    public function create(Request $request)
    {
        try {
            $flight = new Airways();
            if ($request->isMethod('post')) {
                $input = Input::all();

                $validator = Validator::make($input, $flight->createRules(), $flight->messages());
                if ($validator->fails()) {
                    return redirect('/supplier/resources/airways/flight/create')
                        ->withInput()
                        ->withErrors($validator);
                }
                $flight->fill($input);
                $flight->eid = Base::eid();
                $flight->createid = Base::uid();
                $flight->save();
                if ($flight) {
                    return redirect('/supplier/resources/airways/flight/')->withSuccess('保存成功！');
                } else {
                    return Redirect::back()->withErrors('保存失败！');
                }
            }
            return view('supplier.resources.airways.flight.create', compact('flight'));
        } catch (Exception $ex) {
            return Redirect::back()->withInput()->withErrors('异常！' . $ex->getMessage());
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $flight = Airways::find($id);
            if (!$flight) {
                return Redirect::back()->withErrors('数据加载失败！');
            }
            if ($request->isMethod('post')) {
                $input = Input::all();

                $validator = Validator::make($input, $flight->editRules(), $flight->messages());
                if ($validator->fails()) {
                    return redirect('/supplier/resources/airways/flight/edit/' . $id)
                        ->withInput()
                        ->withErrors($validator);
                }
                $flight->fill($input);
                $flight->editid = Base::uid();
                $flight->save();
                if ($flight) {
                    return redirect('/supplier/resources/airways/flight/')->withSuccess('保存成功！');
                } else {
                    return Redirect::back()->withErrors('保存失败！');
                }
            }
            return view('supplier.resources.airways.flight.edit', compact('flight'));
        } catch (Exception $ex) {
            return Redirect::back()->withInput()->withErrors('异常！' . $ex->getMessage());
        }
    }


    public function delete($id)
    {
        $flight = Airways::find($id);
        if ($flight->delete()) {
            return redirect('/supplier/resources/airways/flight/')->withSuccess('删除成功！');
        } else {
            return Redirect::back()->withErrors('数据加载失败！');
        }


    }

}