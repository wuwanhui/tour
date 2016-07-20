@extends('layouts.page')
@section("script")

@endsection

@section('content')
    <div class="page-list">

        <div class="row page-list-header">
            <div class="col-xs-8 text-left">
                <a href="{{url('/supplier/operator/control/airways/transfer/create/')}}"
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
                <h4>中转机</h4>
                <form method="Post" class="form-inline">
                    <table class="table table-bordered table-hover  table-condensed">
                        <thead>
                        <tr style="text-align: center" class="text-center">
                            <th style="width: 20px"><input type="checkbox"
                                                           name="CheckAll" value="Checkid"/></th>
                            <th style="width: 80px;"><a href="">编号</a></th>
                            <th><a href="">控位线路</a></th>
                            <th><a href="">中转类型</a></th>
                            <th><a href="">第几天</a></th>
                            <th><a href="">日期</a></th>
                            <th><a href="">航向</a></th>
                            <th><a href="">班次</a></th>
                            <th><a href="">起飞时间</a></th>
                            <th><a href="">到达时间</a></th>
                            <th><a href="">状态</a></th>
                            <th style="width: 160px;">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transfers as $item)
                            <tr>
                                <td><input type="checkbox" value="{{$item->id}} "
                                           name="id"/></td>
                                <td style="text-align: center">{{$item->id}} </td>
                                <td>{{$item->control_airways->line->name}} </td>
                                <td style="text-align: center">{{$item->transfer_type==0?"去程中转":"回程中转"}}</td>
                                <td style="text-align: center">{{$item->control_day}}</td>
                                <td style="text-align: center">{{$item->transfer_date}}</td>
                                <td style="text-align: center">{{$item->transfer_course}}</td>
                                <td style="text-align: center">{{$item->transfer_shift}}</td>
                                <td style="text-align: center">{{$item->transfer_departure_time}}</td>
                                <td style="text-align: center">{{$item->transfer_arrivala_time}}</td>
                                <td style="text-align: center">
                                    {{$item->state==0?"正常":"禁用"}}</td>

                                <td style="text-align: center"><a
                                            href="{{url('/supplier/operator/control/airways/transfer/edit/'.$item->id)}}">编辑</a>
                                    |
                                    <a
                                            href="{{url('/supplier/operator/control/airways/transfer/delete/'.$item->id)}}">删除</a>
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
                {!! $transfers->links() !!}
            </div>
        </div>
    </div>
@endsection