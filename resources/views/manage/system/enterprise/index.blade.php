@extends('layouts.manage')
@section("script")

@endsection

@section('content')
    <div class="page-list">
        <div class="row page-list-header">
            <div class="col-xs-8 text-left">
                <a href="{{url('/manage/system/enterprise/create')}}" class="btn btn-primary">新增</a>
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
                <form method="Post">

                    <table class="table table-bordered table-hover  table-condensed">
                        <thead>
                        <tr style="text-align: center" class="text-center">
                            <th style="width: 20px"><input type="checkbox"
                                                           name="CheckAll" value="Checkid"/></th>
                            <th style="width: 80px;"><a href="">编号</a></th>

                            <th><a href="">企业全称</a></th>
                            <th><a href="">简称</a></th>
                            <th><a href="">法人代表</a></th>
                            <th><a href="">成立时间</a></th>
                            <th><a href="">联系电话</a></th>
                            <th><a href="">传真号码</a></th>
                            <th><a href="">用户数</a></th>
                            <th style="width: 120px;">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($enterprises as $item)
                            <tr>
                                <td><input type="checkbox" value="{{$item->id}} "
                                           name="id"/></td>
                                <td style="text-align: center">{{$item->id}} </td>
                                <td>{{$item->name}} </td>
                                <td>{{$item->short_name}} </td>
                                <td>{{$item->legal_person}} </td>
                                <td>{{$item->found_time}} </td>
                                <td>{{$item->phone}} </td>
                                <td>{{$item->fax}} </td>
                                <td class="text-center"><a
                                            href="{{url('/manage/system/user/'.$item->id)}}">{{$item->users()->count()}}</a>
                                </td>
                                <td style="text-align: center"><a
                                            href="{{url('/manage/system/enterprise/permission/'.$item->id)}}">权限</a>
                                    |<a
                                            href="{{url('/manage/system/enterprise/edit/'.$item->id)}}">编辑</a> |
                                    <a
                                            href="{{url('/manage/system/enterprise/delete/'.$item->id)}}">删除</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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

            </div>
        </div>
        @include('common.success')

    </div>
@endsection