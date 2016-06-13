@extends('layouts.manage')
@section("script")

@endsection

@section('content')
    <div class="row page-input">
        <div class="col-xs-12">
            <form class="form-horizontal" method="Post"
                  enctype="multipart/form-data" action="{{url('/manage/system/permission')}}">
                <div class="row page-input-header">
                    <div class="col-xs-2  text-left">
                        <button type="button" class="btn btn-default"
                                onclick="vbscript:window.history.back()">返回
                        </button>
                        <button type="submit" class="btn  btn-primary">保存</button>
                        <button type="button" class="btn btn-danger btn-md" data-toggle="modal"
                                data-target="#modal-delete">
                            <i class="fa fa-times-circle"></i>
                            Delete
                        </button>
                    </div>
                    <div class="col-xs-10 text-right"></div>
                </div>
                <div class="row page-input-body">
                    <div class="col-xs-12">
                        <fieldset>
                            <legend>基本信息</legend>
                            {!! csrf_field() !!}
                            <input id="Id" name="Id" type="hidden" value="{{$permission->Id}}"/>
                            <div class="form-group">
                                <label for="name" class="col-xs-2 control-label label-required">权限标识：</label>
                                <div class="col-xs-10">
                                    <input id="name" name="name" class="form-control" type="text"
                                           value="{{$permission->name}}"
                                           style="width: 300px;"/>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="display_name"
                                       class="col-xs-2 control-label label-required">显示名称：</label>
                                <div class="col-xs-10">
                                    <input id="display_name" name="display_name" class="form-control"
                                           style="width: 300px;"
                                           value="{{$permission->display_name}}" type="text"/>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description"
                                       class="col-xs-2 control-label label-required">描述：</label>
                                <div class="col-xs-10">
                                            <textarea id="description" name="description" class="form-control"
                                                      style="width: 100%;height: 100px;">{{$permission->description}}</textarea>

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
    {{-- 确认删除 --}}
    <div class="modal fade" id="modal-delete" tabIndex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        ×
                    </button>
                    <h4 class="modal-title">Please Confirm</h4>
                </div>
                <div class="modal-body">
                    <p class="lead">
                        <i class="fa fa-question-circle fa-lg"></i>
                        Are you sure you want to delete this tag?
                    </p>
                </div>
                <div class="modal-footer">
                    <form method="POST" action="/admin/tag/{{ $id }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-times-circle"></i> Yes
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection