@extends('layouts.manage')
@section("script")

@endsection

@section('content')
    <div class="page-content-side">
        <div class="page-content-side-nav">系统管理</div>
        <div class="page-content-side-menu">
            <a href="/manage/system/enterprise/" target="main">企业管理</a>
            <a href="/manage/system/user/" target="main">用户管理</a>
            <a href="/manage/system/role/" target="main">角色管理</a> <a
                    href="/manage/system/permission/" target="main">权限管理</a>
            <a
                    href="/manage/system/base/" target="main">基础数据</a>

        </div>

    </div>
@endsection