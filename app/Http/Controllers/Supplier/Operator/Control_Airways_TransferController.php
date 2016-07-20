<?php

namespace App\Http\Controllers\Supplier\Operator;

use App\Http\Controllers\Supplier\BaseController;
use App\Http\Facades\Base;
use App\Models\Operator\Control_Airways_Transfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Mockery\CountValidator\Exception;

/**
 * 航空控位-中转机维护
 * @package App\Http\Controllers\Supplier\Operator
 */
class Control_Airways_TransferController extends BaseController
{

    /**
     * 主页
     */
    public function index(Request $request)
    {
        $aid = $request->aid;
        if ($aid) {
            $transfers = Control_Airways_Transfer::where('eid', Base::eid())->where('control_airways_id', $aid)->orderBy('created_at', 'desc')->paginate($this->pageSize);
        } else {

            $transfers = Control_Airways_Transfer::where('eid', Base::eid())->orderBy('created_at', 'desc')->paginate($this->pageSize);
        }

        return view('supplier.operator.control.airways.transfer.index', compact('transfers'));
    }


    public function create(Request $request)
    {
        try {
            $transfer = new Control_Airways_Transfer();
            $aid = $request->aid;
            if ($aid) {
                $transfer->control_airways_id=$aid; 
            }
            if ($request->isMethod('post')) {
                $input = Input::all();

                $validator = Validator::make($input, $transfer->createRules(), $transfer->messages());
                if ($validator->fails()) {
                    return redirect('/supplier/operator/control/airways/transfer/create')
                        ->withInput()
                        ->withErrors($validator);
                }
                $transfer->fill($input);
                $transfer->eid = Base::eid();
                $transfer->createid = Base::uid();
                $transfer->save();
                if ($transfer) {
                    return redirect('/supplier/operator/control/airways/transfer/')->withSuccess('保存成功！');
                } else {
                    return Redirect::back()->withErrors('保存失败！');
                }
            }
            return view('supplier.operator.control.airways.transfer.create', compact('transfer'));
        } catch (Exception $ex) {
            return Redirect::back()->withInput()->withErrors('异常！' . $ex->getMessage());
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $transfer = Control_Airways_Transfer::find($id);
            if (!$transfer) {
                return Redirect::back()->withErrors('数据加载失败！');
            }
            if ($request->isMethod('post')) {
                $input = Input::all();

                $validator = Validator::make($input, $transfer->editRules(), $transfer->messages());
                if ($validator->fails()) {
                    return redirect('/supplier/operator/control/airways/transfer/edit/' . $id)
                        ->withInput()
                        ->withErrors($validator);
                }
                $transfer->fill($input);
                $transfer->editid = Base::uid();
                $transfer->save();
                if ($transfer) {
                    return redirect('/supplier/operator/control/airways/transfer/')->withSuccess('保存成功！');
                } else {
                    return Redirect::back()->withErrors('保存失败！');
                }
            }
            return view('supplier.operator.control.airways.transfer.edit', compact('transfer'));
        } catch (Exception $ex) {
            return Redirect::back()->withInput()->withErrors('异常！' . $ex->getMessage());
        }
    }


    public function delete($id)
    {
        $transfer = Control_Airways_Transfer::find($id);
        if ($transfer->delete()) {
            return redirect('/supplier/operator/control/airways/transfer/')->withSuccess('删除成功！');
        } else {
            return Redirect::back()->withErrors('数据加载失败！');
        }


    }

}