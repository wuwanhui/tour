@extends('layouts.page')
@section("script")

@endsection
@section('content')
    <div class="row page-input">
        <div class="col-xs-12">
            <form class="form-horizontal" method="Post"
                  enctype="multipart/form-data" action="{{url('/supplier/system/dept/create')}}">
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
                            <legend>部门基本信息</legend>
                            {!! csrf_field() !!}
                            @if (isset($parents))
                                <div class="form-group">
                                    <label name="Name"
                                           class="col-xs-2 control-label label-required">所属上级：
                                    </label>
                                    <div class="col-xs-10">
                                        {{$parents->name}}
                                    </div>
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="name" class="col-xs-2 control-label label-required">部门名称：</label>
                                <div class="col-xs-10">
                                    <input id="name" name="name" class="form-control" type="text"
                                           value="{{$dept->name}}"
                                           style="width: 300px;"/>

                                </div>
                            </div>
                            @if (isset($users)&&count($users)>0)
                                <div class="form-group">
                                    <label name="Name"
                                           class="col-xs-2 control-label label-required">责任人：
                                    </label>
                                    <div class="col-xs-10">
                                        <select name="pid" class="form-control">
                                            <option value="">无责任人</option>
                                            @foreach($users as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="phone"
                                       class="col-xs-2 control-label label-required">部门电话：</label>
                                <div class="col-xs-10">
                                    <input id="phone" name="phone" class="form-control"
                                           style="width: 300px;"
                                           value="{{$dept->phone}}" type="text"/>

                                </div>
                            </div>


                            <div class="form-group">
                                <label for="fax"
                                       class="col-xs-2 control-label label-required">传真号码：</label>
                                <div class="col-xs-10">
                                    <input id="fax" name="fax" class="form-control"
                                           style="width: 300px;" type="text"/>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="abstract"
                                       class="col-xs-2 control-label label-required">部门简介：</label>
                                <div class="col-xs-10">
                                    <textarea id="abstract" name="abstract" class="form-control"
                                              style="width: 100%;height:200px;"></textarea>

                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div clas="row page-input-footer">
                    <div class="col-xs-12">@include('common.errors')</div>
                </div>
            </form>
        </div>
    </div>
@endsection