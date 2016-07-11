@extends('layouts.page')
@section("script")

@endsection
@section('content')
    <div class="row page-input">
        <div class="col-xs-12">
            <form class="form-horizontal" method="Post"
                  enctype="multipart/form-data" action="{{url('/manage/system/user/edit/'.$user->id)}}">
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
                            <input id="id" name="id" type="hidden" value="{{$user->id}}"/>

                            @if($enterprises!=null &&count($enterprises)>0 )
                                <div class="form-group">
                                    <label for="enterprise_id"
                                           class="col-xs-2 control-label label-required">所属企业：</label>
                                    <div class="col-xs-10">
                                        <select name="eid" class="form-control">
                                            <option value=" 0" style="color: #002a80;">新增企业</option>
                                            @foreach($enterprises as $item)
                                                <option  value="{{$item->id}}" {{$user->eid==$item->id?'selected':''}}>{{$item->name}}</option>
                                            @endforeach
                                        </select>


                                    </div>
                                </div>
                            @endif
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
                                    <input id="email" name="email" class="form-control" disabled="disabled"
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

                                            <td>
                                                <input type="checkbox" value="{{$item->id}}"
                                                       name="role_id[{{$index}}]"
                                                        {{count( $user->roles->whereIn("id",[$item->id]))>0?'checked':''}}
                                                />


                                            </td>
                                            <td style="text-align: center">{{$item->id}} </td>
                                            <td>{{$item->name}} </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @endif    </fieldset>
                    </div>
                </div>
                <div clas="row page-input-footer">
                    <div class="col-xs-12">@include('common.errors')</div>
                </div>
            </form>
        </div>
    </div>
@endsection