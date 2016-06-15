@extends('layouts.manage')
@section("script")

@endsection

@section('content')
    <div class="row page-input">
        <div class="col-xs-12">
            <form class="form-horizontal" method="Post"
                  enctype="multipart/form-data" action="{{url('/manage/system/role/create')}}">
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
                        @include('manage.system.role._form')
                        <table class="table table-bordered table-hover  table-condensed line-top">
                            <thead>
                            <tr style="text-align: center" class="text-center">
                                <th style="width: 20px"><input type="checkbox"
                                                               name="CheckAll" value="Checkid"/></th>
                                <th style="width: 80px;"><a href="">编号</a></th>
                                <th><a href="">权限标识</a></th>
                                <th><a href="">显示名称</a></th>
                                <th><a href="">备注</a></th>

                                <th style="width: 80px;">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($permissions as $item)
                                <tr>
                                    <td><input type="checkbox" value="{{$item->id}} "
                                               name="id"/></td>
                                    <td style="text-align: center">{{$item->id}} </td>
                                    <td>{{$item->name}} </td>

                                    <td style="text-align: center">{{$item->display_name}}</td>
                                    <td>
                                        {{$item->description}}
                                    </td>
                                    <td style="text-align: center"><a
                                                href="{{url('/manage/system/permission/edit/'.$item->id)}}">编辑</a> |
                                        <a
                                                href="{{url('/manage/system/permission/delete/'.$item->id)}}">删除</a>
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