@extends('layouts.page')
@section("script")

@endsection

@section('content')
    <div class="page-list">
        <div class="row page-list-header">
            <div class="col-xs-8 text-left">
                <a href="{{url('/manage/system/user/create/'.(isset($enterprise) && $enterprise->id or ''))}}"
                   class="btn btn-primary">新增</a>
            </div>
            <div class="col-xs-4 text-right">

                <form method="get" cssClass="form-horizontal">
                    <div class="input-group">

                        <input type="text" class="form-control" placeholder="关键字"
                               name="key" value=""> <span class="input-group-btn">
								<button class="btn btn-default" type="submit">搜索</button>
							</span>

                    </div>
                </form>
            </div>
        </div>
        <div class="row page-list-body">
            <div class="col-md-12">
                <form method="Post" class="form-inline">
                    <fieldset>
                        @if($enterprise!=null)
                            <legend>企业信息</legend>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">企业名称：</label>
                                        <div class="col-sm-10">
                                            <p class="form-control-static">{{$enterprise->name}}</p>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label class="col-sm-2 control-label">用户数：</label>
                                        <div class="col-sm-10">
                                            <p class="form-control-static">{{$enterprise->users->count()}}个</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <legend>用户列表</legend>
                        <table class="table table-bordered table-hover  table-condensed">
                            <thead>
                            <tr style="text-align: center" class="text-center">
                                <th style="width: 20px"><input type="checkbox"
                                                               name="CheckAll" value="Checkid"/></th>
                                <th style="width: 80px;"><a href="">编号</a></th>
                                <th><a href="">所属企业</a></th>
                                <th><a href="">姓名</a></th>
                                <th><a href="">邮箱</a></th>
                                <th><a href="">手机</a></th>
                                <th><a href="">角色</a></th>
                                <th style="width: 120px;">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $item)
                                <tr>
                                    <td><input type="checkbox" value="{{$item->id}} "
                                               name="id"/></td>
                                    <td style="text-align: center">{{$item->id}} </td>
                                    <td>
                                        @if(isset( $item->enterprise))
                                            {{$item->enterprise->name}}
                                        @endif

                                    </td>
                                    <td>{{$item->name}} </td>
                                    <td style="text-align: center">{{$item->email}}
                                        ({{$item->email_check==0?'已验证':'未验证'}})
                                    </td>
                                    <td style="text-align: center">{{$item->mobile}}
                                        ({{$item->email_check==0?'已验证':'未验证'}})
                                    </td>
                                    <td style="text-align: center">
                                        @if(count($item->roles)>0)
                                            @foreach($item->roles as $roleItem)
                                                {{$roleItem->pivot->name}}
                                            @endforeach

                                        @endif</td>
                                    <td style="text-align: center"><a
                                                href="{{url('/manage/system/user/edit/'.$item->id)}}">编辑</a> |
                                        <a
                                                href="{{url('/manage/system/user/delete/'.$item->id)}}">删除</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </fieldset>
                </form>
            </div>
        </div>
        <div class="row page-list-footer">
            <div class="col-xs-6">
                <button class="btn btn-warning " type="submit" name="Delete"
                        onclick="javascript: return confirm('确定要删除选中的信息吗?');"
                        formaction="delete">批量删除
                </button>
            </div>
            <div class="col-xs-6 text-right">
                {!! $users->links() !!}
            </div>
        </div>
        @include('common.success')

    </div>
@endsection