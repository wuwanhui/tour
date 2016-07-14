<?php

namespace App\Http\Controllers\Supplier\Resources;

use App\Http\Controllers\Supplier\BaseController;
use App\Http\Facades\Base;
use App\Models\Resources\Visa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Mockery\CountValidator\Exception;

class VisaController extends BaseController
{

    /**
     * 主页
     */
    public function index()
    {
        $visas = Visa::where('eid', Base::eid())->orderBy('created_at', 'desc')->paginate($this->pageSize);
        return view('supplier.resources.visa.index', compact('visas'));
    }


    public function create(Request $request)
    {
        try {
            $visa = new Visa();
            if ($request->isMethod('post')) {
                $input = Input::all();

                $validator = Validator::make($input, $visa->createRules(), $visa->messages());
                if ($validator->fails()) {
                    return redirect('/supplier/resources/visa/create')
                        ->withInput()
                        ->withErrors($validator);
                }
                $visa->fill($input);
                $visa->eid = Base::eid();
                $visa->createid = Base::uid();
                $visa->save();
                if ($visa) {
                    return redirect('/supplier/resources/visa/')->withSuccess('保存成功！');
                } else {
                    return Redirect::back()->withErrors('保存失败！');
                }
            }
            return view('supplier.resources.visa.create', compact('visa'));
        } catch (Exception $ex) {
            return Redirect::back()->withInput()->withErrors('异常！' . $ex->getMessage());
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $visa = Visa::find($id);
            if (!$visa) {
                return Redirect::back()->withErrors('数据加载失败！');
            }
            if ($request->isMethod('post')) {
                $input = Input::all();

                $validator = Validator::make($input, $visa->editRules(), $visa->messages());
                if ($validator->fails()) {
                    return redirect('/supplier/resources/visa/edit/' . $id)
                        ->withInput()
                        ->withErrors($validator);
                }
                $visa->fill($input);
                $visa->editid = Base::uid();
                $visa->save();
                if ($visa) {
                    return redirect('/supplier/resources/visa/')->withSuccess('保存成功！');
                } else {
                    return Redirect::back()->withErrors('保存失败！');
                }
            }
            return view('supplier.resources.visa.edit', compact('visa'));
        } catch (Exception $ex) {
            return Redirect::back()->withInput()->withErrors('异常！' . $ex->getMessage());
        }
    }


    public function delete($id)
    {
        $visa = Visa::find($id);
        if ($visa->delete()) {
            return redirect('/supplier/resources/visa/')->withSuccess('删除成功！');
        } else {
            return Redirect::back()->withErrors('数据加载失败！');
        }


    }

}