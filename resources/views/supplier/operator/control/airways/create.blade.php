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
                                <label for="link_id"
                                       class="col-xs-2 control-label label-required">线路资源：</label>
                                <div class="col-xs-10">
                                    <select name="link_id" class="form-control">
                                        @foreach($lines as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    <a href="{{url('/supplier/resources/line/create')}}">新增线路资源</a>

                                </div>
                            </div>
                        @else
                            <input type="hidden" name="line_id" value="{{$airways->line_id}}">
                        @endif
                        <div class="form-group">
                            <label for="start_date" class="col-xs-2 control-label label-required">航班日期：</label>
                            <div class="col-xs-4">
                                <input id="start_date" name="start_date" class="form-control" type="text"
                                       value="{{old('start_date')}}" placeholder="可多填，如:2016-12-20,2016-12-25"
                                       style="width: 100%;"/>

                            </div>
                            <label for="back_days" class="col-xs-2 control-label label-required">回程天数：</label>
                            <div class="col-xs-4">
                                <input id="back_days" name="back_days" class="form-control" type="text"
                                       value="{{old('back_days')}}"
                                       style="width: 100px;"/>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="control_num" class="col-xs-2 control-label label-required">控位数：</label>
                            <div class="col-xs-4">
                                <input id="control_num" name="control_num" class="form-control" type="text"
                                       value="{{old('control_num')}}"
                                       style="width: 100px;"/>

                            </div>
                            <label for="drawers_limited"
                                   class="col-xs-2 control-label label-required">出票时限：</label>
                            <div class="col-xs-4">
                                <input id="drawers_limited" name="drawers_limited" class="form-control"
                                       style="width: 200px;"
                                       value="{{old('drawers_limited')}}" type="text"/> 小时

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="adult_price"
                                   class="col-xs-2 control-label label-required">成人价：</label>
                            <div class="col-xs-4">
                                <input id="adult_price" name="adult_price" class="form-control"
                                       style="width: 200px;"
                                       value="{{old('adult_price')}}" type="text"/>

                            </div>
                            <label for="child_price"
                                   class="col-xs-2 control-label label-required">儿童价：</label>
                            <div class="col-xs-4">
                                <input id="child_price" name="child_price" class="form-control"
                                       style="width: 200px;"
                                       value="{{old('child_price')}}" type="text"/>

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
                            <div class="panel-heading"><button type="button" class="btn-link" data-toggle="modal" data-target="#go">
                                    + 选择去程
                                </button></div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label for="start_course" class="col-xs-2 control-label label-required">去程航向：</label>
                                    <div class="col-xs-4">
                                        <input id="start_course" name="start_course" class="form-control" type="text"
                                               value="{{old('start_course')}}" placeholder="如:重庆-北京"
                                               style="width: 200px;"/>

                                    </div>
                                    <label for="start_shift"
                                           class="col-xs-2 control-label label-required">班次：</label>
                                    <div class="col-xs-4">
                                        <input id="start_shift" name="start_shift" class="form-control"
                                               style="width: 200px;"
                                               value="{{old('start_shift')}}" type="text"/>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="start_departure_time" class="col-xs-2 control-label label-required">起飞时间：</label>
                                    <div class="col-xs-4">
                                        <input id="start_departure_time" name="start_departure_time" class="form-control" type="text"
                                               value="{{old('start_departure_time')}}"
                                               style="width: 200px;"/>

                                    </div>
                                    <label for="start_arrivala_time"
                                           class="col-xs-2 control-label label-required">到达时间：</label>
                                    <div class="col-xs-4">
                                        <input id="start_arrivala_time" name="start_arrivala_time" class="form-control"
                                               style="width: 200px;"
                                               value="{{old('start_arrivala_time')}}" type="text"/>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="panel panel-default">
                            <div class="panel-heading"><button type="button" class="btn-link" data-toggle="modal" data-target="#go">
                                    + 选择返程
                                </button></div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label for="back_course" class="col-xs-2 control-label label-required">返程航向：</label>
                                    <div class="col-xs-4">
                                        <input id="back_course" name="back_course" class="form-control" type="text"
                                               value="{{old('back_course')}}" placeholder="如:重庆-北京"
                                               style="width: 200px;"/>

                                    </div>
                                    <label for="back_shift"
                                           class="col-xs-2 control-label label-required">班次：</label>
                                    <div class="col-xs-4">
                                        <input id="back_shift" name="back_shift" class="form-control"
                                               style="width: 200px;"
                                               value="{{old('back_shift')}}" type="text"/>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="back_departure_time" class="col-xs-2 control-label label-required">起飞时间：</label>
                                    <div class="col-xs-4">
                                        <input id="back_departure_time" name="back_departure_time" class="form-control" type="text"
                                               value="{{old('back_departure_time')}}"
                                               style="width: 200px;"/>

                                    </div>
                                    <label for="back_arrivala_time"
                                           class="col-xs-2 control-label label-required">到达时间：</label>
                                    <div class="col-xs-4">
                                        <input id="back_arrivala_time" name="back_arrivala_time" class="form-control"
                                               style="width: 200px;"
                                               value="{{old('back_arrivala_time')}}" type="text"/>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="remark"
                                   class="col-xs-2 control-label label-required">备注：</label>
                            <div class="col-xs-10">
                                <textarea id="remark" name="remark" class="form-control"
                                          style="width: 100%;height: 120px;">{{old('remark')}}</textarea>

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

    <div class="modal fade" id="go">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">班次选择</h4>
                </div>
                <div class="modal-body">
                    <p>One fine body&hellip;</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection