@extends('layouts.page')
@section("script")

@endsection
@section('content')
    <div class="  page-input">
        <form class="form-horizontal" method="Post"
              enctype="multipart/form-data" action="{{url('/supplier/system/user/create')}}">
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
                        <legend>用户基本信息</legend>
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label for="name" class="col-xs-2 control-label label-required">姓名：</label>
                            <div class="col-xs-10">
                                <input id="name" name="name" class="form-control" type="text"
                                       value="{{$user->name}}"
                                       style="width: 300px;"/>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email"
                                   class="col-xs-2 control-label label-required">邮箱：</label>
                            <div class="col-xs-10">
                                <input id="email" name="email" class="form-control"
                                       style="width: 300px;"
                                       value="{{$user->email}}" type="text"/>

                            </div>
                        </div>


                        <div class="form-group">
                            <label for="password"
                                   class="col-xs-2 control-label label-required">密码：</label>
                            <div class="col-xs-10">
                                <input id="password" name="password" class="form-control"
                                       style="width: 300px;" type="text"/>

                            </div>
                        </div>

                        @if($roles!=null&&count($roles)>0)
                            <legend>角色列表</legend>
                            <table class="table table-bordered table-hover  table-condensed">
                                <thead>
                                <tr style="text-align: center" class="text-center">
                                    <th style="width: 20px"><input type="checkbox"
                                                                   name="CheckAll" value="Checkid"
                                                                   onchange="checkName('permission_id')"
                                        /></th>
                                    <th style="width: 80px;"><a href="">编号</a></th>
                                    <th><a href="">角色名称</a></th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $index =>$item)
                                    <tr>
                                        <td><input type="checkbox" value="{{$item->id}}"
                                                   name="role_id[{{$index}}]"
                                            />
                                        </td>
                                        <td style="text-align: center">{{$item->id}} </td>
                                        <td>{{$item->name}} </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </fieldset>
                </div>
            </div>
            <div clas="row page-input-footer">
                <div class="col-xs-12">@include('common.errors')</div>
            </div>
        </form>
    </div>
@endsection