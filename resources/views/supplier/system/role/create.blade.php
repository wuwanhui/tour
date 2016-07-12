@extends('layouts.page')
@section("script")

@endsection

@section('content')
    <div class="row page-input">
        <div class="col-xs-12">
            <form class="form-horizontal" method="Post"
                  enctype="multipart/form-data" action="{{url('/supplier/system/role/create')}}">
                <div class="row page-input-header">
                    <div class="col-xs-2  text-left">
                        <button type="button" class="btn btn-default"
                                onclick="vbscript:window.history.back()">返回
                        </button>
                        <button type="submit" class="btn  btn-primary">下一步</button>

                    </div>
                    <div class="col-xs-10 text-right"></div>
                </div>
                <div class="row page-input-body">
                    <div class="col-xs-12">
                        <fieldset>
                            <legend>角色信息</legend>
                            <fieldset>
                                {!! csrf_field() !!}
                                <div class="form-group">
                                    <label for="name" class="col-xs-2 control-label label-required">角色标识：</label>
                                    <div class="col-xs-10">
                                        <input id="name" name="name" class="form-control" type="text"
                                               value="{{$role->name}}"
                                               style="width: 300px;"/>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="display_name"
                                           class="col-xs-2 control-label label-required">显示名称：</label>
                                    <div class="col-xs-10">
                                        <input id="display_name" name="display_name" class="form-control"
                                               style="width: 300px;"
                                               value="{{$role->display_name}}" type="text"/>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="description"
                                           class="col-xs-2 control-label label-required">描述：</label>
                                    <div class="col-xs-10">
                                            <textarea id="description" name="description" class="form-control"
                                                      style="width: 100%;height: 100px;">{{$role->description}}</textarea>

                                    </div>
                                </div>


                            </fieldset>
                            <legend>权限指定</legend>
                            <table class="table table-bordered table-hover  table-condensed">
                                <thead>
                                <tr style="text-align: center" class="text-center">
                                    <th style="width: 20px"><input type="checkbox"
                                                                   name="CheckAll" value="Checkid"
                                                                   onchange="checkName('permission_id')"
                                        /></th>
                                    <th style="width: 80px;"><a href="">编号</a></th>
                                    <th><a href="">权限标识</a></th>
                                    <th><a href="">显示名称</a></th>
                                    <th><a href="">备注</a></th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($permissions as $index =>   $item)
                                    <tr>

                                        <td><input type="checkbox" value="{{$item->id}} "
                                                   name="permission_id[{{$index}}]"
                                                    {{count( $role->permissions->whereIn("id",[$item->id]))>0?'checked':''}}/>


                                        </td>
                                        <td style="text-align: center">{{$item->id}} </td>
                                        <td>{{$item->name}} </td>

                                        <td style="text-align: center">{{$item->display_name}}</td>
                                        <td>
                                            {{$item->description}}
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
                <div clas="row page-input-footer">
                    <div class="col-xs-12">@include('common.errors')</div>
                </div>
            </form>
        </div>
    </div>
@endsection