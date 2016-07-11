@extends('layouts.page')
@section("script")

@endsection
@section('content')
    <div class="row page-input">
        <div class="col-xs-12">
            <form class="form-horizontal" method="Post"
                  enctype="multipart/form-data" action="{{url('/manage/system/base/create/'.$baseData->tid)}}">
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
                            <input value="{{$baseData->tid}}" name="tid" id="tid" type="hidden"/>

                            <div class="form-group">
                                <label for="name" class="col-xs-2 control-label label-required">数据名称：</label>
                                <div class="col-xs-10">
                                    <input id="name" name="name" class="form-control" type="text"
                                           value="{{$baseData->name}}"
                                           style="width: 300px;"/>

                                </div>
                            </div>


                            <div class="form-group">
                                <label for="value"
                                       class="col-xs-2 control-label label-required">数据值：</label>
                                <div class="col-xs-10">
                                    <input id="value" name="value" class="form-control"
                                           style="width: 300px;"
                                           value="{{$baseData->value}}" type="text"/>

                                </div>
                            </div>


                            <div class="form-group">
                                <label for="sort"
                                       class="col-xs-2 control-label label-required">排序：</label>
                                <div class="col-xs-10">
                                    <input id="sort" name="sort" class="form-control"
                                           style="width: 300px;" type="text" value="{{$baseData->sort}}"/>

                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection