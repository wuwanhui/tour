<?php

namespace App\Http\Controllers\Supplier\Resources;

use App\Http\Controllers\Supplier\BaseController;
use App\Http\Facades\Base;
use App\Models\Resources\Line;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Mockery\CountValidator\Exception;

class LineController extends BaseController
{

    /**
     * 主页
     */
    public function index()
    {
        $lines = Line::where('eid', Base::eid())->orderBy('created_at', 'desc')->paginate($this->pageSize);
        return view('supplier.resources.line.index', compact('lines'));
    }


    public function create(Request $request)
    {
        try {
            $Line = new Line();
            if ($request->isMethod('post')) {
                $input = Input::all();

                $validator = Validator::make($input, $Line->createRules(), $Line->messages());
                if ($validator->fails()) {
                    return redirect('/supplier/resources/Line/create')
                        ->withInput()
                        ->withErrors($validator);
                }
                $Line->fill($input);
                $Line->eid = Base::eid();
                $Line->createid = Base::uid();
                $Line->save();
                if ($Line) {
                    return redirect('/supplier/resources/Line/')->withSuccess('保存成功！');
                } else {
                    return Redirect::back()->withErrors('保存失败！');
                }
            }
            return view('supplier.resources.line.create', compact('Line'));
        } catch (Exception $ex) {
            return Redirect::back()->withInput()->withErrors('异常！' . $ex->getMessage());
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $Line = Line::find($id);
            if (!$Line) {
                return Redirect::back()->withErrors('数据加载失败！');
            }
            if ($request->isMethod('post')) {
                $input = Input::all();

                $validator = Validator::make($input, $Line->editRules(), $Line->messages());
                if ($validator->fails()) {
                    return redirect('/supplier/resources/Line/edit/' . $id)
                        ->withInput()
                        ->withErrors($validator);
                }
                $Line->fill($input);
                $Line->editid = Base::uid();
                $Line->save();
                if ($Line) {
                    return redirect('/supplier/resources/Line/')->withSuccess('保存成功！');
                } else {
                    return Redirect::back()->withErrors('保存失败！');
                }
            }
            return view('supplier.resources.line.edit', compact('Line'));
        } catch (Exception $ex) {
            return Redirect::back()->withInput()->withErrors('异常！' . $ex->getMessage());
        }
    }


    public function delete($id)
    {
        $Line = Line::find($id);
        if ($Line->delete()) {
            return redirect('/supplier/resources/Line/')->withSuccess('删除成功！');
        } else {
            return Redirect::back()->withErrors('数据加载失败！');
        }


    }

}