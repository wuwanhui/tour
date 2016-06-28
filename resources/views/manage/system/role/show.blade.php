@extends('layouts.manage')
@section("script")

@endsection

@section('content')
    <div class="row page-input">
        <div class="col-xs-12">
            <form class="form-horizontal" method="Post"
                  enctype="multipart/form-data" action="{{url('/manage/system/permission/delete')}}">
                <input type="hidden" name="id" value="{{$permission->id}}">
                <div class="row page-input-header">
                    <div class="col-xs-2  text-left">
                        <button type="button" class="btn btn-default"
                                onclick="vbscript:window.history.back()">返回
                        </button>
                        <button type="submit" class="btn btn-warning">确认删除</button>

                    </div>
                    <div class="col-xs-10 text-right"></div>
                </div>
                <div class="row page-input-body">
                    <div class="col-xs-12">
                        <fieldset>
                            <legend>删除信息</legend>
                            {!! csrf_field() !!}
                            <input id="Id" name="Id" type="hidden" value="{{$permission->Id}}"/>
                            <div class="form-group">
                                <label for="name" class="col-xs-2 control-label label-required">权限标识：</label>
                                <div class="col-xs-10">
                                    {{$permission->name}}

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="display_name"
                                       class="col-xs-2 control-label label-required">显示名称：</label>
                                <div class="col-xs-10">
                                    {{$permission->display_name}}

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description"
                                       class="col-xs-2 control-label label-required">描述：</label>
                                <div class="col-xs-10">
                                    {{$permission->description}}

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