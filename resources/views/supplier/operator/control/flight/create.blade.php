@extends('layouts.page')
@section("script")

@endsection
@section('content')
    <div class="  page-input">
        <form class="form-horizontal" method="Post"
              enctype="multipart/form-data" action="{{url('/supplier/resources/airways/flight/create')}}">
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

                        @if(isset($airways))
                            <div class="form-group">
                                <label for="airways_id"
                                       class="col-xs-2 control-label label-required">所属航空公司：</label>
                                <div class="col-xs-10">
                                    <select name="airways_id" class="form-control">
                                        @foreach($airways as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    <a href="{{url('/supplier/resources/airways/create')}}">新增航空公司</a>

                                </div>
                            </div>
                        @else
                            <input type="hidden" name="airways_id" value="{{$flight->airways_id}}">
                        @endif

                        <div class="form-group">
                            <label for="course" class="col-xs-2 control-label label-required">航向：</label>
                            <div class="col-xs-10">
                                <input id="course" name="course" class="form-control" type="text"
                                       value="{{$flight->course}}"
                                       style="width: 300px;" placeholder="如:重庆-北京"/>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="shift"
                                   class="col-xs-2 control-label label-required">航班号/班次：</label>
                            <div class="col-xs-10">
                                <input id="shift" name="shift" class="form-control"
                                       style="width: 300px;"
                                       value="{{$flight->shift}}" type="text"/>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="departure_time"
                                   class="col-xs-2 control-label label-required">起飞时间：</label>
                            <div class="col-xs-10">
                                <input id="departure_time" name="departure_time" class="form-control"
                                       style="width: 300px;"
                                       value="{{$flight->departure_time}}" type="text"/>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="arrivala_time"
                                   class="col-xs-2 control-label label-required">到达时间：</label>
                            <div class="col-xs-10">
                                <input id="arrivala_time" name="arrivala_time" class="form-control"
                                       style="width: 300px;"
                                       value="{{$flight->arrivala_time}}" type="text"/>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="remark"
                                   class="col-xs-2 control-label label-required">备注：</label>
                            <div class="col-xs-10">
                                <textarea id="remark" name="remark" class="form-control"
                                          style="width: 100%;height: 120px;">{{$flight->remark}}</textarea>

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