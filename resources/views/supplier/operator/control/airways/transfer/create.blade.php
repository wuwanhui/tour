@extends('layouts.page')
@section("script")

@endsection
@section('content')
    <div class="  page-input">
        <form class="form-horizontal" method="Post"
              enctype="multipart/form-data" action="{{url('/supplier/operator/control/airways/create')}}">
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
                        <legend>基本信息</legend>
                        {!! csrf_field() !!}
                        @if(isset($lines))
                            <div class="form-group">
                                <label for="airways_id"
                                       class="col-xs-2 control-label label-required">线路资源：</label>
                                <div class="col-xs-10">
                                    <select name="airways_id" class="form-control">
                                        @foreach($lines as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    <a href="{{url('/supplier/resources/airways/create')}}">新增线路资源</a>

                                </div>
                            </div>
                        @else
                            <input type="hidden" name="line_id" value="{{$airways->line_id}}">
                        @endif
                        <div class="form-group">
                            <label for="name" class="col-xs-2 control-label label-required">航班日期：</label>
                            <div class="col-xs-10">
                                <input id="name" name="name" class="form-control" type="text"
                                       value="{{$airways->name}}" placeholder="可多填，如:2016-12-20,2016-12-25"
                                       style="width: 500px;"/>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-xs-2 control-label label-required">控位数：</label>
                            <div class="col-xs-4">
                                <input id="name" name="name" class="form-control" type="text"
                                       value="{{$airways->name}}"
                                       style="width: 100px;"/>

                            </div>
                            <label for="drawers_limited"
                                   class="col-xs-2 control-label label-required">出票时限：</label>
                            <div class="col-xs-4">
                                <input id="drawers_limited" name="drawers_limited" class="form-control"
                                       style="width: 200px;"
                                       value="{{$airways->drawers_limited}}" type="text"/>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="adult_price"
                                   class="col-xs-2 control-label label-required">成人价：</label>
                            <div class="col-xs-4">
                                <input id="adult_price" name="adult_price" class="form-control"
                                       style="width: 200px;"
                                       value="{{$airways->adult_price}}" type="text"/>

                            </div>
                            <label for="child_price"
                                   class="col-xs-2 control-label label-required">儿童价：</label>
                            <div class="col-xs-4">
                                <input id="child_price" name="child_price" class="form-control"
                                       style="width: 200px;"
                                       value="{{$airways->child_price}}" type="text"/>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="control_state"
                                   class="col-xs-2 control-label label-required">控位状态：</label>
                            <div class="col-xs-10">
                                <select id="control_state" name="control_state" class="form-control">
                                    <option value="0">未出票</option>
                                    <option value="1">已出票</option>
                                    <option value="2">已暂停</option>
                                    <option value="3">已取消</option>
                                </select>

                            </div>
                        </div>

                        <legend>往返航程</legend>

                        <div class="panel panel-default">
                            <div class="panel-heading">去程</div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label for="name" class="col-xs-2 control-label label-required">去程航向：</label>
                                    <div class="col-xs-4">
                                        <input id="name" name="name" class="form-control" type="text"
                                               value="{{$airways->name}}" placeholder="如:重庆-北京"
                                               style="width: 200px;"/>

                                    </div>
                                    <label for="drawers_limited"
                                           class="col-xs-2 control-label label-required">班次：</label>
                                    <div class="col-xs-4">
                                        <input id="drawers_limited" name="drawers_limited" class="form-control"
                                               style="width: 200px;"
                                               value="{{$airways->drawers_limited}}" type="text"/>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-xs-2 control-label label-required">起飞时间：</label>
                                    <div class="col-xs-4">
                                        <input id="name" name="name" class="form-control" type="text"
                                               value="{{$airways->name}}"
                                               style="width: 200px;"/>

                                    </div>
                                    <label for="drawers_limited"
                                           class="col-xs-2 control-label label-required">到达时间：</label>
                                    <div class="col-xs-4">
                                        <input id="drawers_limited" name="drawers_limited" class="form-control"
                                               style="width: 200px;"
                                               value="{{$airways->drawers_limited}}" type="text"/>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="panel panel-default">
                            <div class="panel-heading">返程</div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label for="name" class="col-xs-2 control-label label-required">返程航向：</label>
                                    <div class="col-xs-4">
                                        <input id="name" name="name" class="form-control" type="text"
                                               value="{{$airways->name}}" placeholder="如:重庆-北京"
                                               style="width: 200px;"/>

                                    </div>
                                    <label for="drawers_limited"
                                           class="col-xs-2 control-label label-required">班次：</label>
                                    <div class="col-xs-4">
                                        <input id="drawers_limited" name="drawers_limited" class="form-control"
                                               style="width: 200px;"
                                               value="{{$airways->drawers_limited}}" type="text"/>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-xs-2 control-label label-required">起飞时间：</label>
                                    <div class="col-xs-4">
                                        <input id="name" name="name" class="form-control" type="text"
                                               value="{{$airways->name}}"
                                               style="width: 200px;"/>

                                    </div>
                                    <label for="drawers_limited"
                                           class="col-xs-2 control-label label-required">到达时间：</label>
                                    <div class="col-xs-4">
                                        <input id="drawers_limited" name="drawers_limited" class="form-control"
                                               style="width: 200px;"
                                               value="{{$airways->drawers_limited}}" type="text"/>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">中转</div>
                            <div class="panel-body">
                                <table class="table table-bordered table-hover  table-condensed">
                                    <thead>
                                    <tr style="text-align: center" class="text-center">
                                        <th style="width: 20px"><input type="checkbox"
                                                                       name="CheckAll" value="Checkid"/></th>
                                        <th style="width: 80px;"><a href="">编号</a></th>
                                        <th style="width: 120px;"><a href="">方向</a></th>
                                        <th style="width: 120px;"><a href="">第几天</a></th>
                                        <th><a href="">航向</a></th>
                                        <th><a href="">班次</a></th>
                                        <th><a href="">起飞时间</a></th>
                                        <th><a href="">到达时间</a></th>
                                        <th style="width: 160px;">操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox" value="1 "
                                                   name="id"/></td>
                                        <td style="text-align: center">1</td>
                                        <td>去程</td>
                                        <td style="text-align: center">1</td>
                                        <td style="text-align: center">重庆-北京</td>
                                        <td style="text-align: center">A1213213-1</td>
                                        <td style="text-align: center">12:10</td>
                                        <td style="text-align: center">15:10</td>

                                        <td style="text-align: center"> 上移 | 删除
                                        </td>
                                    </tr>
                                    <tr class="input">
                                        <td><input type="checkbox" value="1 "
                                                   name="id"/></td>
                                        <td style="text-align: center">1</td>
                                        <td><input list="browsers">

                                            <datalist id="browsers">
                                                <option value="0">去程</option>
                                                <option value="0">去程中转</option>
                                                <option value="1">回程</option>
                                                <option value="1">回程中转</option>
                                            </datalist>
                                        </td>
                                        <td style="text-align: center"><input list="days">

                                            <datalist id="days">
                                                <option value="1">第一天</option>
                                                <option value="2">第二天</option>
                                                <option value="3">第三天</option>
                                                <option value="4">第四天</option>
                                                <option value="5">第五天</option>
                                                <option value="6">第六天</option>
                                            </datalist>
                                        </td>
                                        <td style="text-align: center"><a>选择</a></td>
                                        <td style="text-align: center"><input type="text"/></td>
                                        <td style="text-align: center"><input type="text"/></td>
                                        <td style="text-align: center"><input type="text"/></td>

                                        <td style="text-align: center"> 上移 | 删除
                                        </td>
                                    </tr>
                                    @if(isset($hb))
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
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <hr/>
                        <div class="form-group">
                            <label for="remark"
                                   class="col-xs-2 control-label label-required">备注：</label>
                            <div class="col-xs-10">
                                <textarea id="remark" name="remark" class="form-control"
                                          style="width: 100%;height: 120px;">{{$airways->remark}}</textarea>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="state"
                                   class="col-xs-2 control-label label-required">状态：</label>
                            <div class="col-xs-10">
                                <select id="state" name="state" class="form-control">
                                    <option value="0">启用</option>
                                    <option value="1">禁用</option>
                                </select>

                            </div>
                        </div>

                    </fieldset>
                </div>
            </div>
        </form>
    </div>
@endsection