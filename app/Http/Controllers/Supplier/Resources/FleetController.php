<?php

namespace App\Http\Controllers\Supplier\Resources;

use App\Http\Controllers\Supplier\BaseController;
use App\Http\Facades\Base;
use App\Models\Resources\Fleet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Mockery\CountValidator\Exception;

class FleetController extends BaseController
{

    /**
     * 主页
     */
    public function index()
    {
        $fleets = Fleet::where('eid', Base::eid())->orderBy('created_at', 'desc')->paginate($this->pageSize);
        return view('supplier.resources.fleet.index', compact('fleets'));
    }


    public function create(Request $request)
    {
        try {
            $fleet = new Fleet();
            if ($request->isMethod('post')) {
                $input = Input::all();

                $validator = Validator::make($input, $fleet->createRules(), $fleet->messages());
                if ($validator->fails()) {
                    return redirect('/supplier/resources/fleet/create')
                        ->withInput()
                        ->withErrors($validator);
                }
                $fleet->fill($input);
                $fleet->eid = Base::eid();
                $fleet->createid = Base::uid();
                $fleet->save();
                if ($fleet) {
                    return redirect('/supplier/resources/fleet/')->withSuccess('保存成功！');
                } else {
                    return Redirect::back()->withErrors('保存失败！');
                }
            }
            return view('supplier.resources.fleet.create', compact('fleet'));
        } catch (Exception $ex) {
            return Redirect::back()->withInput()->withErrors('异常！' . $ex->getMessage());
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $fleet = Fleet::find($id);
            if (!$fleet) {
                return Redirect::back()->withErrors('数据加载失败！');
            }
            if ($request->isMethod('post')) {
                $input = Input::all();

                $validator = Validator::make($input, $fleet->editRules(), $fleet->messages());
                if ($validator->fails()) {
                    return redirect('/supplier/resources/fleet/edit/' . $id)
                        ->withInput()
                        ->withErrors($validator);
                }
                $fleet->fill($input);
                $fleet->editid = Base::uid();
                $fleet->save();
                if ($fleet) {
                    return redirect('/supplier/resources/fleet/')->withSuccess('保存成功！');
                } else {
                    return Redirect::back()->withErrors('保存失败！');
                }
            }
            return view('supplier.resources.fleet.edit', compact('fleet'));
        } catch (Exception $ex) {
            return Redirect::back()->withInput()->withErrors('异常！' . $ex->getMessage());
        }
    }


    public function delete($id)
    {
        $fleet = Fleet::find($id);
        if ($fleet->delete()) {
            return redirect('/supplier/resources/fleet/')->withSuccess('删除成功！');
        } else {
            return Redirect::back()->withErrors('数据加载失败！');
        }


    }

}