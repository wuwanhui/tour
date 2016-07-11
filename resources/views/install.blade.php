@extends('layouts.page')
@section("script")

@endsection

@section('content')
    <div class="page-list col-md-8 col-md-offset-2" style="margin-top: 50px;">
        <form method="post" action="{{url('/install')}}">
            {{ csrf_field() }}
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">元佑科技“旅游管理平台”安装</h3>
                </div>
                <div class="panel-body">
                    条款

                </div>
                <div class="panel-footer">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">安装</button>
                    @include('common.success')
                    @include('common.errors')
                </div>
            </div>
        </form>
    </div>
@endsection