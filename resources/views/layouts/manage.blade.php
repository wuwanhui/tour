<!DOCTYPE html>
<html lang="zh-CN" ng-app="app">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>授权平台-@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/resources/js/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/resources/css/base.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/resources/css/page.css') }}">
    @yield('style')

</head>
<body>
<div class="page">
    <div class="page-header">
        <div class="page-header-top">
            <div class="page-header-top-logo">{{session('config')->name}}</div>
            <div class="page-header-top-nav"><a href="{{url('/manage')}}">管理后台</a> | <a
                        href="{{url('/supplier')}}">供应商</a> |
                <a href="{{url('/manage/userinfo')}}">  {{ Auth::user()->name }} </a> | <a
                        href="{{url('/logout')}}">退出</a>
            </div>
        </div>
        <div class="page-header-nav">
            <div class="page-header-nav-user">
                <div class="page-header-nav-user-img">
                    <i class="icon-fire" style="color: red;"></i>
                </div>
                吴红（管理员）
            </div>
            <div class="page-header-nav-menu">
                <a href="/manage/enterprise/" <?php echo(isset($model) && $model === 'business' ? ' class="active"' : '');?>>企业中心</a>
                <a href="/manage/customer/" <?php echo(isset($model) && $model === 'customer' ? ' class="active"' : '');?>>资源中心</a>
                <a href="/manage/finance/" <?php echo(isset($model) && $model === 'finance' ? ' class="active"' : '');?>>产品调度</a>
                <a href="/manage/system/" <?php echo(isset($model) && $model === 'system' ? ' class="active"' : '');?>>系统管理</a>
                <a href="/manage/docking/" <?php echo(isset($model) && $model === 'docking' ? ' class="active"' : '');?> >三方对接</a>
            </div>
            <div class="clear"></div>
        </div>
    </div>

    <div class="page-content">
        @if(isset($model))
            <div class="page-content-side">
                <?php if( $model === 'system'){ ?>
                <div class="page-content-side-nav">系统管理</div>
                <div class="page-content-side-menu">
                    <a href="/manage/system/enterprise/">企业管理</a>
                    <a href="/manage/system/user/">用户管理</a>
                    <a href="/manage/system/role/">角色管理</a> <a
                            href="/manage/system/permission/">权限管理</a>
                    <a
                            href="/manage/system/base/">基础数据</a>

                </div>

                <?php }?>
            </div>
        @endif
        <div class="page-content-area">
            @yield('content')
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            @include('common.success')
            @include('common.errors')
        </div>
        <div class="clear"></div>
    </div>
    <div class="page-footer">重庆爱旅游科技有限公司</div>
</div>
<script type="text/javascript">
    //系统退出
    function exit() {
        //询问框
        layer.confirm('确认退出？', {
            btn: ['确认', '取消']
            //按钮
        }, function () {
            window.location.href = '/manage/login';

        });
    }

    //关于我们
    function about() {
        layer.open({
            type: 2,
            title: '关于我们',
            shadeClose: true,
            shade: 0.8,
            area: ['60%', '50%'],
            content: 'http://www.baidu.com/' //iframe的url
        });

    }
</script>

<script src="{{ asset('/resources/js/angularJs/angular1.5.5.min.js') }}"></script>
<script src="{{ asset('/resources/js/angularJs/angular-messages.min.js') }}"></script>
<script src="{{ asset('/resources/js/angularJs/angularBase.js') }}"></script>
<script src="{{ asset('/resources/js/jquery-2.1.1.min.js') }}"></script>
<script src="{{ asset('/resources/js/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/resources/js/layer/layer.js') }}"></script>
<script src="{{ asset('/resources/js/common.js') }}"></script>
@yield('script')
</body>
</html>