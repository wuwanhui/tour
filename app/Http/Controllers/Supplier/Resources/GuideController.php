<?php

namespace App\Http\Controllers\Supplier\Resources;

use App\Http\Controllers\Supplier\BaseController;
use App\Http\Facades\Base;
use App\Models\Resources\Guide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Mockery\CountValidator\Exception;

class GuideController extends BaseController
{

    /**
     * 主页
     */
    public function index()
    {
        $guides = Guide::where('eid', Base::eid())->orderBy('created_at', 'desc')->paginate($this->pageSize);
        return view('supplier.resources.guide.index', compact('guides'));
    }


    public function create(Request $request)
    {
        try {
            $guide = new Guide();
            if ($request->isMethod('post')) {
                $input = Input::all();

                $validator = Validator::make($input, $guide->createRules(), $guide->messages());
                if ($validator->fails()) {
                    return redirect('/supplier/resources/guide/create')
                        ->withInput()
                        ->withErrors($validator);
                }
                $guide->fill($input);
                $guide->eid = Base::eid();
                $guide->createid = Base::uid();
                $guide->save();
                if ($guide) {
                    return redirect('/supplier/resources/guide/')->withSuccess('保存成功！');
                } else {
                    return Redirect::back()->withErrors('保存失败！');
                }
            }
            return view('supplier.resources.guide.create', compact('guide'));
        } catch (Exception $ex) {
            return Redirect::back()->withInput()->withErrors('异常！' . $ex->getMessage());
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $guide = Guide::find($id);
            if (!$guide) {
                return Redirect::back()->withErrors('数据加载失败！');
            }
            if ($request->isMethod('post')) {
                $input = Input::all();

                $validator = Validator::make($input, $guide->editRules(), $guide->messages());
                if ($validator->fails()) {
                    return redirect('/supplier/resources/guide/edit/' . $id)
                        ->withInput()
                        ->withErrors($validator);
                }
                $guide->fill($input);
                $guide->editid = Base::uid();
                $guide->save();
                if ($guide) {
                    return redirect('/supplier/resources/guide/')->withSuccess('保存成功！');
                } else {
                    return Redirect::back()->withErrors('保存失败！');
                }
            }
            return view('supplier.resources.guide.edit', compact('guide'));
        } catch (Exception $ex) {
            return Redirect::back()->withInput()->withErrors('异常！' . $ex->getMessage());
        }
    }


    public function delete($id)
    {
        $guide = Guide::find($id);
        if ($guide->delete()) {
            return redirect('/supplier/resources/guide/')->withSuccess('删除成功！');
        } else {
            return Redirect::back()->withErrors('数据加载失败！');
        }


    }

}