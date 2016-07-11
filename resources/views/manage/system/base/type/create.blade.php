@extends('layouts.page')
@section("script")

@endsection
@section('content')
    <div class="row page-input">
        <div class="col-xs-12">
            <form class="form-horizontal" method="Post"
                  enctype="multipart/form-data" action="{{url('/manage/system/base/type/create')}}">
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
                            <legend>基本数据分类</legend>
                            {!! csrf_field() !!}


                            <div class="form-group">
                                <label for="name" class="col-xs-2 control-label label-required">分类名称：</label>
                                <div class="col-xs-10">
                                    <input id="name" name="name" class="form-control" type="text"
                                           value="{{$baseType->name}}"
                                           style="width: 300px;"/>

                                </div>
                            </div>


                            <div class="form-group">
                                <label for="code"
                                       class="col-xs-2 control-label label-required">标识：</label>
                                <div class="col-xs-10">
                                    <input id="code" name="code" class="form-control"
                                           style="width: 300px;"
                                           value="{{$baseType->code}}" type="text"/>

                                </div>
                            </div>


                            <div class="form-group">
                                <label for="abstract"
                                       class="col-xs-2 control-label label-required">描述：</label>
                                <div class="col-xs-10">
                                    <textarea id="abstract" name="abstract" class="form-control"
                                              style="width: 500px;height: 120px;">{{$baseType->abstract}}</textarea>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="state"
                                       class="col-xs-2 control-label label-required">状态：</label>
                                <div class="col-xs-10">
                                    <select id="state" name="state" class="form-control">
                                        <option value="0">系统</option>
                                        <option value="1">自定义</option>
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection