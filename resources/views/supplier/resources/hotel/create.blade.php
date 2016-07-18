@extends('layouts.page')
@section("script")

@endsection
@section('content')
    <div class="  page-input">
        <form class="form-horizontal" method="Post"
              enctype="multipart/form-data" action="{{url('/supplier/resources/hotel/create')}}">
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
                        <legend>基本信息</legend>
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label for="name" class="col-xs-2 control-label label-required">航空公司：</label>
                            <div class="col-xs-10">
                                <input id="name" name="name" class="form-control" type="text"
                                       value="{{$hotel->name}}"
                                       style="width: 500px;"/>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="linkman"
                                   class="col-xs-2 control-label label-required">联系人：</label>
                            <div class="col-xs-10">
                                <input id="linkman" name="linkman" class="form-control"
                                       style="width: 200px;"
                                       value="{{$hotel->linkman}}" type="text"/>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mobile"
                                   class="col-xs-2 control-label label-required">手机号：</label>
                            <div class="col-xs-10">
                                <input id="mobile" name="mobile" class="form-control"
                                       style="width: 300px;"
                                       value="{{$hotel->mobile}}" type="text"/>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tel"
                                   class="col-xs-2 control-label label-required">联系电话：</label>
                            <div class="col-xs-10">
                                <input id="tel" name="tel" class="form-control"
                                       style="width: 300px;"
                                       value="{{$hotel->tel}}" type="text"/>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fax"
                                   class="col-xs-2 control-label label-required">传真：</label>
                            <div class="col-xs-10">
                                <input id="fax" name="fax" class="form-control"
                                       style="width: 300px;"
                                       value="{{$hotel->fax}}" type="text"/>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="remark"
                                   class="col-xs-2 control-label label-required">备注：</label>
                            <div class="col-xs-10">
                                <textarea id="remark" name="remark" class="form-control"
                                          style="width: 100%;height: 120px;">{{$hotel->remark}}</textarea>

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