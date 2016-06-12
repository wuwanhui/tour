@extends('layouts.manage')
@section("script")

@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <form class="form-horizontal" method="Post"
                  enctype="multipart/form-data">
                <div class="panel panel-content">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-2  text-left">
                                <button type="button" class="btn btn-default"
                                        onclick="vbscript:window.history.back()">返回
                                </button>
                                <button type="submit" class="btn  btn-primary">保存</button>

                            </div>
                            <div class="col-xs-10 text-right"></div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <fieldset>
                                    <legend>基本信息</legend>
                                    {!! csrf_field() !!}
                                    <div class="form-group">
                                        <label for="Name" class="col-xs-2 control-label label-required">标识：</label>
                                        <div class="col-xs-10">
                                            <input id="name" name="name" class="form-control" type="text"
                                                   value="{{$role->name}}"
                                                   style="width: 300px;"/>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="WeiXin" class="col-xs-2 control-label label-required">名称：</label>
                                        <div class="col-xs-10">
                                            <input id="display_name" name="display_name" class="form-control"
                                                   style="width: 300px;"
                                                   value="{{$role->display_name}}" type="text"/>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="Welcom" class="col-xs-2 control-label label-required">描述：</label>
                                        <div class="col-xs-10">
                                            <textarea id="description" name="description" class="form-control"
                                                      style="width: 100%;height: 100px;">{{$role->description}}</textarea>

                                        </div>
                                    </div>


                                </fieldset>
                            </div>
                        </div>
                    </div>

                    <div clas="panel-footer">
                        @include('common.errors')
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection