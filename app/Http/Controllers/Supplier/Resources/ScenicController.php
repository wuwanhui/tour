<?php

namespace App\Http\Controllers\Supplier\Resources;

use App\Http\Controllers\Supplier\BaseController;
use App\Http\Facades\Base;
use App\Models\Resources\Scenic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Mockery\CountValidator\Exception;

class ScenicController extends BaseController
{

    /**
     * 主页
     */
    public function index()
    {
        $scenics = Scenic::where('eid', Base::eid())->orderBy('created_at', 'desc')->paginate($this->pageSize);
        return view('supplier.resources.scenic.index', compact('scenics'));
    }


    public function create(Request $request)
    {
        try {
            $scenic = new Scenic();
            if ($request->isMethod('post')) {
                $input = Input::all();

                $validator = Validator::make($input, $scenic->createRules(), $scenic->messages());
                if ($validator->fails()) {
                    return redirect('/supplier/resources/scenic/create')
                        ->withInput()
                        ->withErrors($validator);
                }
                $scenic->fill($input);
                $scenic->eid = Base::eid();
                $scenic->createid = Base::uid();
                $scenic->save();
                if ($scenic) {
                    return redirect('/supplier/resources/scenic/')->withSuccess('保存成功！');
                } else {
                    return Redirect::back()->withErrors('保存失败！');
                }
            }
            return view('supplier.resources.scenic.create', compact('scenic'));
        } catch (Exception $ex) {
            return Redirect::back()->withInput()->withErrors('异常！' . $ex->getMessage());
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $scenic = Scenic::find($id);
            if (!$scenic) {
                return Redirect::back()->withErrors('数据加载失败！');
            }
            if ($request->isMethod('post')) {
                $input = Input::all();

                $validator = Validator::make($input, $scenic->editRules(), $scenic->messages());
                if ($validator->fails()) {
                    return redirect('/supplier/resources/scenic/edit/' . $id)
                        ->withInput()
                        ->withErrors($validator);
                }
                $scenic->fill($input);
                $scenic->editid = Base::uid();
                $scenic->save();
                if ($scenic) {
                    return redirect('/supplier/resources/scenic/')->withSuccess('保存成功！');
                } else {
                    return Redirect::back()->withErrors('保存失败！');
                }
            }
            return view('supplier.resources.scenic.edit', compact('scenic'));
        } catch (Exception $ex) {
            return Redirect::back()->withInput()->withErrors('异常！' . $ex->getMessage());
        }
    }


    public function delete($id)
    {
        $scenic = Scenic::find($id);
        if ($scenic->delete()) {
            return redirect('/supplier/resources/scenic/')->withSuccess('删除成功！');
        } else {
            return Redirect::back()->withErrors('数据加载失败！');
        }


    }

}