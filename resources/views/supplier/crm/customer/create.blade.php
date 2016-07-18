@extends('layouts.page')
@section("script")

@endsection
@section('content')
    <div class="  page-input">
        <form class="form-horizontal" method="Post"
              enctype="multipart/form-data" action="{{url('/supplier/crm/customer/create')}}">
            <div class="row page-input-header">
                <div class="col-xs-2  text-left">
                    <button type="button" class="btn btn-default"
                            onclick="vbscript:window.history.back()">返回
                    </button>
                    <button type="submit" class="btn  btn-primary">保存</button>

                </div>
                <div class="col-xs-10 text-right"></div>
            </div>
            <div class="row page-input-body">
                <div class="col-xs-12">
                    <fieldset>
                        <legend>客户基本信息</legend>
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label for="name" class="col-xs-2 control-label label-required">客户名称：</label>
                            <div class="col-xs-10">
                                <input id="name" name="name" class="form-control" type="text"
                                       value="{{$customer->name}}"
                                       style="width: 500px;"/>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pid" class="col-xs-2 control-label label-required">所属企业：</label>
                            <div class="col-xs-10">
                                <input id="pid" name="pid" class="form-control" type="text"
                                       value="{{$customer->pid}}"
                                       style="width: 500px;"/>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="person_liable" class="col-xs-2 control-label label-required">责任人：</label>
                            <div class="col-xs-10">
                                <input id="person_liable" name="person_liable" class="form-control" type="text"
                                       value="{{$customer->days}}"
                                       style="width: 100px;"/>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mobile" class="col-xs-2 control-label label-required">手机号：</label>
                            <div class="col-xs-10">
                                <input id="mobile" name="mobile" class="form-control" type="text"
                                       value="{{$customer->mobile}}"
                                       style="width: 200px;"/>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tel" class="col-xs-2 control-label label-required">电话：</label>
                            <div class="col-xs-10">
                                <input id="tel" name="tel" class="form-control" type="text"
                                       value="{{$customer->tel}}"
                                       style="width: 300px;"/>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fax" class="col-xs-2 control-label label-required">传真：</label>
                            <div class="col-xs-10">
                                <input id="fax" name="fax" class="form-control" type="text"
                                       value="{{$customer->fax}}"
                                       style="width: 300px;"/>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="qq" class="col-xs-2 control-label label-required">QQ：</label>
                            <div class="col-xs-10">
                                <input id="qq" name="qq" class="form-control" type="text"
                                       value="{{$customer->qq}}"
                                       style="width: 300px;"/>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-xs-2 control-label label-required">电子邮件：</label>
                            <div class="col-xs-10">
                                <input id="email" name="email" class="form-control" type="text"
                                       value="{{$customer->email}}"
                                       style="width: 300px;"/>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="addres" class="col-xs-2 control-label label-required">联系地址：</label>
                            <div class="col-xs-10">
                                <input id="addres" name="addres" class="form-control" type="text"
                                       value="{{$customer->addres}}"
                                       style="width: 500px;"/>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="remark"
                                   class="col-xs-2 control-label label-required">备注：</label>
                            <div class="col-xs-10">
                                <textarea id="remark" name="remark" class="form-control"
                                          style="width: 100%;height: 120px;">{{$customer->remark}}</textarea>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="commissioner_id"
                                   class="col-xs-2 control-label label-required">服务专员：</label>
                            <div class="col-xs-10">
                                <select id="commissioner_id" name="commissioner_id" class="form-control">
                                    <option value="">请选择服务专员</option>
                                    @foreach(Base::enterprise('users') as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="state"
                                   class="col-xs-2 control-label label-required">状态：</label>
                            <div class="col-xs-10">
                                <select id="state" name="state" class="form-control">
                                    <option value="0">启用</option>
                                    <option value="1">禁用</option>
                                </select>

                            </div>
                        </div>

                    </fieldset>
                </div>
            </div>
        </form>
    </div>
@endsection