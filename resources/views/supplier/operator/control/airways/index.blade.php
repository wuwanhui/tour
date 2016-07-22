@extends('layouts.page')
@section("script")

@endsection

@section('content')
    <div class="page-list">

        <div class="row page-list-header">
            <div class="col-xs-8 text-left">
                <a href="{{url('/supplier/operator/control/airways/create/')}}"
                   class="btn btn-primary">新增</a>
            </div>
            <div class="col-xs-4 text-right">

                <form class="form-horizontal" method="get"
                      enctype="multipart/form-data" action="{{url('/supplier/operator/control/airways')}}">
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
                    <li class="active"><a href="/supplier/operator/control/airways/">飞机控位</a>
                    </li>
                    <li><a href="/supplier/operator/control/flight/">酒店控房</a>
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
                            <th><a href="">线路</a></th>
                            <th style="width: 180px;"><a href="">去程</a></th>
                            <th style="width: 180px;"><a href="">回程</a></th>
                            <th style="width: 160px;"><a href="">控位数</a></th>
                            <th style="width: 160px;"><a href="">销售/成本价格</a></th>
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
                                <td>{{$item->line->name}} </td>
                                <td><p class="text-info">航程：{{$item->start_course}} {{$item->start_shift}}</p>
                                    <p class="text-info">日期：{{$item->start_date}}</p>
                                    <p class="text-info">时间：{{$item->start_departure_time}}
                                        -{{$item->start_arrivala_time}}</p>

                                </td>
                                <td>
                                    @if(isset($item->back_course))
                                        <p class="text-info">
                                            航程：{{$item->back_course or '无指定回程'}} {{$item->back_shift}}</p>  <p
                                                class="text-info">
                                            日期：{{$item->back_date}}</p>
                                        <p class="text-info">时间：{{$item->back_departure_time}}
                                            -{{$item->back_arrivala_time}}</p>
                                    @endif
                                </td>
                                <td style="text-align: center"><p class="text-success">计划数：{{$item->control_num}}</p>
                                    <p class="text-danger">确认数：{{$item->control_num}}</p>
                                    <p class="text-info">占位数：{{$item->control_num}}</p></td>
                                <td style="text-align: center"><p class="text-info">成人：{{$item->adult_price}}</p>
                                    <p class="text-info">儿童：{{$item->child_price}}</p></td>
                                <td style="text-align: center">
                                    {{$item->state==0?"正常":"禁用"}}</td>

                                <td style="text-align: center"><a
                                            href="{{url('/supplier/operator/control/airways/transfer?aid='.$item->id)}}">中转机({{count($item->flights)}}
                                        )</a>
                                    | <a
                                            href="{{url('/supplier/operator/control/airways/edit/'.$item->id)}}">编辑</a>
                                    |
                                    <a
                                            href="{{url('/supplier/operator/control/airways/delete/'.$item->id)}}">删除</a>
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