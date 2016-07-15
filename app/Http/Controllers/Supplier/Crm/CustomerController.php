<?php

namespace App\Http\Controllers\Supplier\Crm;

use App\Http\Controllers\Supplier\BaseController;
use App\Http\Facades\Base;
use App\Models\Crm\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Mockery\CountValidator\Exception;

class CustomerController extends BaseController
{

    /**
     * 主页
     */
    public function index()
    {
        $customers = Customer::where('eid', Base::eid())->orderBy('created_at', 'desc')->paginate($this->pageSize);
        return view('supplier.crm.customer.index', compact('customers'));
    }


    public function create(Request $request)
    {
        try {
            $customer = new Customer();
            if ($request->isMethod('post')) {
                $input = Input::all();

                $validator = Validator::make($input, $customer->createRules(), $customer->messages());
                if ($validator->fails()) {
                    return redirect('/supplier/crm/customer/create')
                        ->withInput()
                        ->withErrors($validator);
                }
                $customer->fill($input);
                $customer->eid = Base::eid();
                $customer->createid = Base::uid();
                $customer->save();
                if ($customer) {
                    return redirect('/supplier/crm/customer/')->withSuccess('保存成功！');
                } else {
                    return Redirect::back()->withErrors('保存失败！');
                }
            }
            return view('supplier.crm.customer.create', compact('customer'));
        } catch (Exception $ex) {
            return Redirect::back()->withInput()->withErrors('异常！' . $ex->getMessage());
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $customer = Customer::find($id);
            if (!$customer) {
                return Redirect::back()->withErrors('数据加载失败！');
            }
            if ($request->isMethod('post')) {
                $input = Input::all();

                $validator = Validator::make($input, $customer->editRules(), $customer->messages());
                if ($validator->fails()) {
                    return redirect('/supplier/crm/customer/edit/' . $id)
                        ->withInput()
                        ->withErrors($validator);
                }
                $customer->fill($input);
                $customer->editid = Base::uid();
                $customer->save();
                if ($customer) {
                    return redirect('/supplier/crm/customer/')->withSuccess('更新成功！');
                } else {
                    return Redirect::back()->withErrors('更新失败！');
                }
            }
            return view('supplier.crm.customer.edit', compact('customer'));
        } catch (Exception $ex) {
            return Redirect::back()->withInput()->withErrors('异常！' . $ex->getMessage());
        }
    }

    public function copy($id)
    {
        try {
            $customer = Customer::find($id);
            if (!$customer) {
                return Redirect::back()->withErrors('数据加载失败！');
            }
            $customer->name .= "（复制）";
            return view('supplier.crm.customer.create', compact('customer'));
        } catch (Exception $ex) {
            return Redirect::back()->withInput()->withErrors('异常！' . $ex->getMessage());
        }
    }

    public function delete($id)
    {
        $Customer = Customer::find($id);
        if ($Customer->delete()) {
            return redirect('/supplier/crm/customer/')->withSuccess('删除成功！');
        } else {
            return Redirect::back()->withErrors('数据加载失败！');
        }


    }

}