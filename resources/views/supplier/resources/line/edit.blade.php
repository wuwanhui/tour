@extends('layouts.page')
@section("script")

@endsection
@section('content')
    <div class="  page-input">
        <form class="form-horizontal" method="Post"
              enctype="multipart/form-data" action="{{url('/supplier/resources/line/edit/'.$line->id)}}">
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
                        <legend>线路基本信息</legend>
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label for="name" class="col-xs-2 control-label label-required">线路名称：</label>
                            <div class="col-xs-10">
                                <input id="name" name="name" class="form-control" type="text"
                                       value="{{$line->name}}"
                                       style="width: 500px;"/>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="headerh_image" class="col-xs-2 control-label label-required">标题图片：</label>
                            <div class="col-xs-10">
                                <input id="headerh_image" name="headerh_image" class="form-control" type="text"
                                       value="{{$line->headerh_image}}"
                                       style="width: 500px;"/>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="days" class="col-xs-2 control-label label-required">行程天数：</label>
                            <div class="col-xs-10">
                                <input id="days" name="days" class="form-control" type="text"
                                       value="{{$line->days}}"
                                       style="width: 100px;"/> 天

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="is_control_airways"
                                   class="col-xs-2 control-label label-required">飞机控位：</label>
                            <div class="col-xs-10">
                                <select id="is_control_airways" name="is_control_airways" class="form-control">
                                    <option value="0" {{ $line->is_control_airways==0?"selected":""}} >否</option>
                                    <option value="1" {{ $line->is_control_airways==1?"selected":""}}>是</option>
                                </select>

                            </div>
                        </div>
                        @if($shopping=Base::data('shopping'))
                            <div class="form-group">
                                <label for="shopping"
                                       class="col-xs-2 control-label label-required">{{$shopping->name}}：</label>
                                <div class="col-xs-10">
                                    <select id="shopping" name="shopping" class="form-control">
                                        <option value="">待定</option>
                                        @foreach($shopping->datas as $item)
                                            <option value="{{$item->vlaue}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="characteristic"
                                   class="col-xs-2 control-label label-required">行程特色：</label>
                            <div class="col-xs-10">
                                <textarea id="characteristic" name="characteristic" class="form-control"
                                          style="width: 100%;height: 120px;">{{$line->characteristic}}</textarea>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="service_standards"
                                   class="col-xs-2 control-label label-required">服务标准：</label>
                            <div class="col-xs-10">
                                <textarea id="service_standards" name="service_standards" class="form-control"
                                          style="width: 100%;height: 120px;">{{$line->service_standards}}</textarea>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="considerations"
                                   class="col-xs-2 control-label label-required">注意事项：</label>
                            <div class="col-xs-10">
                                <textarea id="considerations" name="considerations" class="form-control"
                                          style="width: 100%;height: 120px;">{{$line->considerations}}</textarea>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="attachment" class="col-xs-2 control-label label-required">相关附件：</label>
                            <div class="col-xs-10">
                                <input id="attachment" name="attachment" class="form-control" type="text"
                                       value="{{$line->attachment}}"
                                       style="width: 500px;"/>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="remark"
                                   class="col-xs-2 control-label label-required">备注：</label>
                            <div class="col-xs-10">
                                <textarea id="remark" name="remark" class="form-control"
                                          style="width: 100%;height: 120px;">{{$line->remark}}</textarea>

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