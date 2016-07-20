@extends('layouts.app')

@section('content')

    <div class="container page-login">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}
            <div class="modal show " id="LoginForm" aria-labelledby="myModalLabel" data-backdrop="static"
                 style="padding-top: 200px;">
                <div class="modal-dialog">
                    <div class="modal-content"
                         style="border-top-width: 5px; border-top-color: #336699; border-top-style: solid;">
                        <div class="modal-header">
                            <h4 class="modal-title">
                                <i class="icon-desktop"></i> 千番旅行-管理
                            </h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">

                                <div class="col-xs-12">
                                    <input id="email" type="email" class="form-control  input-lg" name="email"
                                           value="{{ old('email') }}" placeholder="邮箱" style="width: 100%;"> <i
                                            class="icon-user form-control-feedback"></i>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group  has-feedback" {{ $errors->has('password') ? ' has-error' : '' }}>
                                <div class="col-xs-12">
                                    <input id="password" type="password" class="form-control  input-lg" name="password"
                                           style="width: 100%;" placeholder="密码"><i
                                            class="icon-eye-open form-control-feedback"
                                    ></i>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6 "><label class="checkbox" style="padding-left: 20px;"> <input
                                                type="checkbox" name="remember">
                                        记住登录</label></div>
                                <div class="col-xs-6 text-right">
                                    <a class="btn btn-link" href="{{ url('/password/reset') }}">找加密码？</a></div>
                            </div>
                            @if (session('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif
                            @include('common.success')
                            @include('common.errors')

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-lg btn-block ">登录</button>

                        </div>

                    </div>


                </div>
            </div>
        </form>
    </div>

@endsection
