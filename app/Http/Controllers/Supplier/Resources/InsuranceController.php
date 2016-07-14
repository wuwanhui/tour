<?php

namespace App\Http\Controllers\Supplier\Resources;

use App\Http\Controllers\Supplier\BaseController;
use App\Http\Facades\Base;
use App\Models\Resources\Insurance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Mockery\CountValidator\Exception;

class InsuranceController extends BaseController
{

    /**
     * 主页
     */
    public function index()
    {
        $insurances = Insurance::where('eid', Base::eid())->orderBy('created_at', 'desc')->paginate($this->pageSize);
        return view('supplier.resources.insurance.index', compact('insurances'));
    }


    public function create(Request $request)
    {
        try {
            $insurance = new Insurance();
            if ($request->isMethod('post')) {
                $input = Input::all();

                $validator = Validator::make($input, $insurance->createRules(), $insurance->messages());
                if ($validator->fails()) {
                    return redirect('/supplier/resources/insurance/create')
                        ->withInput()
                        ->withErrors($validator);
                }
                $insurance->fill($input);
                $insurance->eid = Base::eid();
                $insurance->createid = Base::uid();
                $insurance->save();
                if ($insurance) {
                    return redirect('/supplier/resources/insurance/')->withSuccess('保存成功！');
                } else {
                    return Redirect::back()->withErrors('保存失败！');
                }
            }
            return view('supplier.resources.insurance.create', compact('insurance'));
        } catch (Exception $ex) {
            return Redirect::back()->withInput()->withErrors('异常！' . $ex->getMessage());
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $insurance = Insurance::find($id);
            if (!$insurance) {
                return Redirect::back()->withErrors('数据加载失败！');
            }
            if ($request->isMethod('post')) {
                $input = Input::all();

                $validator = Validator::make($input, $insurance->editRules(), $insurance->messages());
                if ($validator->fails()) {
                    return redirect('/supplier/resources/insurance/edit/' . $id)
                        ->withInput()
                        ->withErrors($validator);
                }
                $insurance->fill($input);
                $insurance->editid = Base::uid();
                $insurance->save();
                if ($insurance) {
                    return redirect('/supplier/resources/insurance/')->withSuccess('保存成功！');
                } else {
                    return Redirect::back()->withErrors('保存失败！');
                }
            }
            return view('supplier.resources.insurance.edit', compact('insurance'));
        } catch (Exception $ex) {
            return Redirect::back()->withInput()->withErrors('异常！' . $ex->getMessage());
        }
    }


    public function delete($id)
    {
        $insurance = Insurance::find($id);
        if ($insurance->delete()) {
            return redirect('/supplier/resources/insurance/')->withSuccess('删除成功！');
        } else {
            return Redirect::back()->withErrors('数据加载失败！');
        }


    }

}