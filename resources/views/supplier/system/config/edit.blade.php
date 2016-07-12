@extends('layouts.page')
@section("script")

@endsection

@section('content')
    <div class="page-input">
        <div class="row">
            <div class="col-md-12">
                <form name="form" method="Post" action="{{ URL('/supplier/system/config') }}"
                      class="form-horizontal" enctype="multipart/form-data">
                    <div class="page-input-btn">
                        <div class="row">
                            <div class="col-xs-2  text-left">
                                <button type="button" class="btn btn-default">返回</button>
                                </button>
                                <button type="submit" class="btn  btn-primary">保存
                                </button>
                            </div>
                            <div class="col-xs-10 text-right">{{session('message')}}</div>
                        </div>
                    </div>
                    <div class="page-input-content">
                        {!! csrf_field() !!}
                        <fieldset>
                            <legend>基本信息</legend>
                            <div class="form-group">
                                <label name="Name"
                                       class="col-xs-2 control-label label-required">系统名称：
                                </label>
                                <div class="col-xs-10">
                                    <input name="name" class="form-control" value="{{$config->name}}"
                                           style="width:500px;"/>

                                </div>
                            </div>

                            <div class="form-group">
                                <label name="logo"
                                       class="col-xs-2 control-label label-required">标志：
                                </label>
                                <div class="col-xs-10">

                                    <input type="file" name="logoFile" id="logoFile"
                                           accept="image/*"/>
                                    <hidden name="logo" value="{{$config->logo}}"/>

                                </div>
                            </div>
                            <div class="form-group">
                                <label name="legal_person"
                                       class="col-xs-2 control-label label-required">域名：
                                </label>
                                <div class="col-xs-10">
                                    <input name="domain" class="form-control"
                                           value="{{$config->domain}}"
                                           style="width:500px;"/>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>资源存储</legend>
                            <div class="form-group">
                                <label name="found_time"
                                       class="col-xs-2 control-label label-required">资源地址：
                                </label>
                                <div class="col-xs-10">
                                    <input name="assets_domain" class="form-control" value="{{$config->assets_domain}}"
                                           style="width:500px;"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label name="phone"
                                       class="col-xs-2 control-label label-required">Access：
                                </label>
                                <div class="col-xs-10">
                                    <input name="qiniu_access" class="form-control" value="{{$config->qiniu_access}}"
                                           style="width:500px;"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label name="fax"
                                       class="col-xs-2 control-label label-required">Secret：
                                </label>
                                <div class="col-xs-10">
                                    <input name="qiniu_secret" class="form-control" value="{{$config->qiniu_secret}}"
                                           style="width:500px;"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label name="address"
                                       class="col-xs-2 control-label label-required">空间名：
                                </label>
                                <div class="col-xs-10">
                                    <input name="qiniu_bucket_name" class="form-control"
                                           value="{{$config->qiniu_bucket_name}}"
                                           style="width:200px;"/>
                                </div>
                            </div>

                        </fieldset>
                    </div>

                </form>
            </div>

        </div>
    </div>
@endsection