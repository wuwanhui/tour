@extends('layouts.page')
@section("script")

@endsection

@section('content')
    <div class="page-list">

        <div class="row page-list-header">
            <div class="col-xs-8 text-left">
                <a href="{{url('/supplier/resources/airways/create/')}}"
                   class="btn btn-primary">新增</a>
            </div>
            <div class="col-xs-4 text-right">

                <form class="form-horizontal" method="get"
                      enctype="multipart/form-data" action="{{url('/supplier/resources/airways')}}">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="关键字"
                               name="key" value="{{request('key')}}"> <span class="input-group-btn">
								<button class="btn btn-default" type="submit">搜索</button>
							</span>

                    </div>
                </form>
            </div>
        </div>

        <div class="row page-list-body">

            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="/supplier/resources/airways/">航空公司</a>
                    </li>
                    <li><a href="/supplier/resources/airways/flight/">班次管理</a>
                    </li>
                </ul>
                <br/>
                <form method="Post" class="form-inline">
                    <table class="table table-bordered table-hover  table-condensed">
                        <thead>
                        <tr style="text-align: center" class="text-center">
                            <th style="width: 20px"><input type="checkbox"
                                                           name="CheckAll" value="Checkid"/></th>
                            <th style="width: 80px;"><a href="">编号</a></th>
                            <th><a href="">航空公司</a></th>
                            <th><a href="">联系人</a></th>
                            <th><a href="">手机</a></th>
                            <th><a href="">电话</a></th>
                            <th><a href="">传真</a></th>
                            <th><a href="">状态</a></th>
                            <th style="width: 160px;">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($airways as $item)
                            <tr>
                                <td><input type="checkbox" value="{{$item->id}} "
                                           name="id"/></td>
                                <td style="text-align: center">{{$item->id}} </td>
                                <td>{{$item->name}} </td>
                                <td style="text-align: center">{{$item->linkman}}</td>
                                <td style="text-align: center">{{$item->mobile}}</td>
                                <td style="text-align: center">{{$item->tel}}</td>
                                <td style="text-align: center">{{$item->fax}}</td>
                                <td style="text-align: center">
                                    {{$item->state==0?"正常":"禁用"}}</td>

                                <td style="text-align: center"><a
                                            href="{{url('/supplier/resources/airways/flight?aid='.$item->id)}}">班次({{count($item->flights)}}
                                        )</a>
                                    | <a
                                            href="{{url('/supplier/resources/airways/edit/'.$item->id)}}">编辑</a>
                                    |
                                    <a
                                            href="{{url('/supplier/resources/airways/delete/'.$item->id)}}">删除</a>
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
                {!! $airways->links() !!}
            </div>
        </div>
    </div>
@endsection