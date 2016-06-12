@extends('layouts.supplier')
@section("script")

@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <form class="form-horizontal" method="Post"
                  enctype="multipart/form-data">
                <div class="panel panel-content">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-2  text-left">
                                <button type="button" class="btn btn-default"
                                        onclick="vbscript:window.history.back()">返回
                                </button>
                                <button type="submit" class="btn  btn-primary">保存</button>

                            </div>
                            <div class="col-xs-10 text-right"></div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <fieldset>
                                    <legend>基本信息</legend>
                                    {!! csrf_field() !!}
                                    <input id="Id" name="Id" type="hidden" value="{{$weixin->Id}}"/>
                                    <div class="form-group">
                                        <label for="Name" class="col-xs-2 control-label label-required">微信名称：</label>
                                        <div class="col-xs-10">
                                            <input id="Name" name="Name" class="form-control" type="text"
                                                   value="{{$weixin->Name}}"
                                                   style="width: 300px;"/>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="WeiXin" class="col-xs-2 control-label label-required">微信号：</label>
                                        <div class="col-xs-10">
                                            <input id="WeiXin" name="WeiXin" class="form-control" style="width: 300px;"
                                                   value="{{$weixin->WeiXin}}" type="text"/>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="AppID" class="col-xs-2 control-label label-required">AppID：</label>
                                        <div class="col-xs-10">
                                            <input id="AppID" name="AppID" class="form-control" style="width: 500px;"
                                                   value="{{$weixin->AppID}}" type="text"/>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="AppSecret"
                                               class="col-xs-2 control-label label-required">AppSecret：</label>
                                        <div class="col-xs-10">
                                            <input id="AppSecret" name="AppSecret" class="form-control"
                                                   value="{{$weixin->AppSecret}}" style="width: 500px;" type="text"/>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Token" class="col-xs-2 control-label label-required">Token：</label>
                                        <div class="col-xs-10">
                                            <input id="Token" name="Token" class="form-control" style="width: 300px;"
                                                   value="{{$weixin->Token}}" type="text"/>

                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>微信支付</legend>
                                    <div class="form-group">
                                        <label for="MchId" class="col-xs-2 control-label label-required">商户号：</label>
                                        <div class="col-xs-10">
                                            <input id="MchId" name="MchId" class="form-control" style="width: 300px;"
                                                   value="{{$weixin->MchId}}" type="text"/>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="PayKey" class="col-xs-2 control-label label-required">支付密钥：</label>
                                        <div class="col-xs-10">
                                            <input id="PayKey" name="PayKey" class="form-control" style="width: 300px;"
                                                   value="{{$weixin->PayKey}}" type="text"/>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="EncodingAESKey"
                                               class="col-xs-2 control-label label-required">EncodingAESKey：</label>
                                        <div class="col-xs-10">
                                            <input id="EncodingAESKey" name="EncodingAESKey" class="form-control"
                                                   value="{{$weixin->EncodingAESKey}}" style="width: 500px;"
                                                   type="text"/>

                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>其它信息</legend>
                                    <div class="form-group">
                                        <label for="AdminOpenId"
                                               class="col-xs-2 control-label label-required">公众号管理员：</label>
                                        <div class="col-xs-10">
                                            <input id="AdminOpenId" name="AdminOpenId" class="form-control"
                                                   value="{{$weixin->AdminOpenId}}" style="width: 300px;"
                                                   type="text"/>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Welcom" class="col-xs-2 control-label label-required">关注欢迎语：</label>
                                        <div class="col-xs-10">
                                            <textarea id="Welcom" name="Welcom" class="form-control"
                                                      style="width: 100%;height: 100px;">{{$weixin->Welcom}}</textarea>

                                        </div>
                                    </div>


                                </fieldset>
                            </div>
                        </div>
                    </div>

                    <div clas="panel-footer">
                        @include('common.errors')
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection