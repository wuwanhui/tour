@extends('layouts.manage')
@section("script")

@endsection

@section('content')
    <div class="row page-input">
        <div class="col-xs-12">
            <form class="form-horizontal" method="Post"
                  enctype="multipart/form-data" action="{{url('/manage/system/role/permission')}}">
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
                            <legend>角色信息</legend>
                            {!! csrf_field() !!}

                            @include('manage.system.role._show')
                            <legend>权限列表</legend>
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