<?php

namespace App\Http\Controllers\Supplier\Resources;

use App\Http\Controllers\Supplier\BaseController;
use App\Http\Facades\Base;
use App\Models\Resources\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Mockery\CountValidator\Exception;

class HotelController extends BaseController
{

    /**
     * 主页
     */
    public function index()
    {
        $hotels = Hotel::where('eid', Base::eid())->orderBy('created_at', 'desc')->paginate($this->pageSize);
        return view('supplier.resources.hotel.index', compact('hotels'));
    }


    public function create(Request $request)
    {
        try {
            $hotel = new Hotel();
            if ($request->isMethod('post')) {
                $input = Input::all();

                $validator = Validator::make($input, $hotel->createRules(), $hotel->messages());
                if ($validator->fails()) {
                    return redirect('/supplier/resources/hotel/create')
                        ->withInput()
                        ->withErrors($validator);
                }
                $hotel->fill($input);
                $hotel->eid = Base::eid();
                $hotel->createid = Base::uid();
                $hotel->save();
                if ($hotel) {
                    return redirect('/supplier/resources/hotel/')->withSuccess('保存成功！');
                } else {
                    return Redirect::back()->withErrors('保存失败！');
                }
            }
            return view('supplier.resources.hotel.create', compact('hotel'));
        } catch (Exception $ex) {
            return Redirect::back()->withInput()->withErrors('异常！' . $ex->getMessage());
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $hotel = Hotel::find($id);
            if (!$hotel) {
                return Redirect::back()->withErrors('数据加载失败！');
            }
            if ($request->isMethod('post')) {
                $input = Input::all();

                $validator = Validator::make($input, $hotel->editRules(), $hotel->messages());
                if ($validator->fails()) {
                    return redirect('/supplier/resources/hotel/edit/' . $id)
                        ->withInput()
                        ->withErrors($validator);
                }
                $hotel->fill($input);
                $hotel->editid = Base::uid();
                $hotel->save();
                if ($hotel) {
                    return redirect('/supplier/resources/hotel/')->withSuccess('保存成功！');
                } else {
                    return Redirect::back()->withErrors('保存失败！');
                }
            }
            return view('supplier.resources.hotel.edit', compact('hotel'));
        } catch (Exception $ex) {
            return Redirect::back()->withInput()->withErrors('异常！' . $ex->getMessage());
        }
    }


    public function delete($id)
    {
        $hotel = Hotel::find($id);
        if ($hotel->delete()) {
            return redirect('/supplier/resources/hotel/')->withSuccess('删除成功！');
        } else {
            return Redirect::back()->withErrors('数据加载失败！');
        }


    }

}