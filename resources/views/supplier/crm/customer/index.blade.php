@extends('layouts.page')
@section("script")

@endsection

@section('content')
    <div class="page-list">
        <div class="row page-list-header">
            <div class="col-xs-8 text-left">
                <a href="{{url('/supplier/crm/customer/create/')}}"
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
                <form method="Post" class="form-incustomer">
                    <fieldset>
                        <legend>客户档案</legend>
                        <table class="table table-bordered table-hover  table-condensed">
                            <thead>
                            <tr style="text-align: center" class="text-center">
                                <th style="width: 20px"><input type="checkbox"
                                                               name="CheckAll" value="Checkid"/></th>
                                <th style="width: 80px;"><a href="">编号</a></th>
                                <th><a href="">客户名称</a></th>
                                <th><a href="">所属单位</a></th>
                                <th><a href="">责任人</a></th>
                                <th><a href="">手机</a></th>
                                <th><a href="">电话</a></th>
                                <th><a href="">服务专员</a></th>
                                <th><a href="">状态</a></th>
                                <th style="width: 160px;">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customers as $item)
                                <tr>
                                    <td><input type="checkbox" value="{{$item->id}} "
                                               name="id"/></td>
                                    <td style="text-align: center">{{$item->id}} </td>
                                    <td>{{$item->name}} </td>
                                    <td style="text-align: center">   {{$item->pid}}</td>
                                    <td style="text-align: center">   {{$item->person_liable}}</td>
                                    <td style="text-align: center">   {{$item->mobile}}</td>
                                    <td style="text-align: center">   {{$item->tel}}</td>
                                    <td style="text-align: center">
                                        @if($item->commissioner)
                                            {{$item->commissioner->name}}
                                        @else
                                            未分配
                                        @endif

                                    </td>
                                    <td style="text-align: center">
                                        {{$item->state==0?"正常":"禁用"}}</td>

                                    <td style="text-align: center"><a
                                                href="{{url('/supplier/crm/customer/edit/'.$item->id)}}">编辑</a>
                                        | <a
                                                href="{{url('/supplier/crm/customer/copy/'.$item->id)}}">复制</a>
                                        |
                                        <a
                                                href="{{url('/supplier/crm/customer/delete/'.$item->id)}}">删除</a>
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
                {!! $customers->links() !!}
            </div>
        </div>
    </div>
@endsection