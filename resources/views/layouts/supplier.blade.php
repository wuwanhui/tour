<!DOCTYPE html>
<html lang="zh-CN" ng-app="app">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>供应商系统-@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/resources/js/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/resources/css/base.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/resources/css/page.css') }}">
    @yield('style')

</head>
<body>
<div class="page">
    <div class="page-header">
        <div class="page-header-top">
            <div class="page-header-top-logo">{{Base::Config('name')}}</div>
            <div class="page-header-top-nav"><a href="{{url('/manage')}}">管理后台</a> | <a
                        href="{{url('/supplier')}}">供应商</a> | {{ Auth::user()->name }} <a
                        href="{{url('/logout')}}">退出</a>
                | <span class="a"
                        onclick="about();">关于我们</span>
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
                <span name="business">业务中心</span>
                <span name="customer">客服关系</span>
                <span name="weixin">微信营销</span>
                <span name="finance">财务结算</span>
                <span name="resources">资源中心</span>
                <span name="report">统计报表</span>
                <span name="system">系统管理</span>
                <span name="docking">三方对接</span>

            </div>
            <form class="page-header-nav-search">
                <input type="text" placeholder="团期、订单、客户、组团社"/> <input
                        type="submit" class="icon-search " value="搜索"/>
            </form>

            <div class="clear"></div>
        </div>
    </div>
    <div class="page-content">
        <div class="page-content-side">
            <div class="business">
                <div class="page-content-side-nav">业务中心</div>
                <div class="page-content-side-menu ">
                    <a target="main" href="/supplier/activity/">增加团队</a> <a
                            target="main" href="/supplier/analysis/">增加散拼</a> <a
                            target="main" href="/supplier/analysis/">团队操作</a> <a
                            target="main" href="/supplier/analysis/">订单列表</a> <a
                            target="main" href="/supplier/analysis/">到账认领</a> <a
                            target="main" href="/supplier/analysis/">收款记录</a> <a
                            target="main" href="/supplier/analysis/">付款记录</a>
                    <hr/>
                    <a target="main" href="/supplier/activity/">控位管理</a> <a
                            target="main" href="/supplier/analysis/">团队成本</a>
                </div>
            </div>
            <div class="business">
                <div class="page-content-side-nav">客户关系</div>
                <div class="page-content-side-menu customer">
                    <a target="main" href="/supplier/crm/directories/">资源名录</a> <a
                            target="main" href="/supplier/crm/customer/">客户档案</a> <a
                            target="main" href="/supplier/crm/following/">联系记录</a> <a
                            target="main" href="/supplier/crm/orders/">订单管理</a> <a
                            target="main" href="/supplier/crm/product/">产品管理</a> <a
                            target="main" href="/supplier/crm/logs/">业务分析</a>
                </div>
            </div>
            <div class="business">
                <div class="page-content-side-nav">微信营销</div>
                <div class="page-content-side-menu weixin">
                    <a target="main" href="/supplier/weixin/concern/">关注记录</a> <a
                            target="main" href="/supplier/weixin/menu/">个性菜单</a> <a
                            target="main" href="/supplier/weixin/template/">信息模板</a> <a
                            target="main" href="/supplier/weixin/groups/">分组管理</a> <a
                            target="main" href="/supplier/weixin/scene/">营销场景</a> <a
                            target="main" href="/supplier/weixin/kf/">多客服</a><a
                            target="main" href="/supplier/weixin/config/">参数配置</a>
                </div>
            </div>
            <div class="business">
                <div class="page-content-side-nav">财务结算</div>
                <div class="page-content-side-menu finance">
                    <a target="main" href="/supplier/finance/detailed/">单团明细台帐</a> <a
                            target="main" href="/supplier/finance/detailed/">封团结算审核</a> <a
                            target="main" href="/supplier/finance/detailed/">付款管理</a> <a
                            target="main" href="/supplier/finance/detailed/">付款审核</a> <a
                            target="main" href="/supplier/finance/detailed/">收款管理</a> <a
                            target="main" href="/supplier/finance/detailed/">发票管理</a> <a
                            target="main" href="/supplier/finance/detailed/">现金日记帐</a> <a
                            target="main" href="/supplier/finance/detailed/">科目管理</a> <a
                            target="main" href="/supplier/finance/detailed/">绩效管理</a> <a
                            target="main" href="/supplier/finance/detailed/">积分管理</a>
                    <hr/>
                    <a target="main" href="#/supplier/finance/analysis/">财务分析</a>
                </div>
            </div>
            <div class="resources">
                <div class="page-content-side-nav">资源中心</div>
                <div class="page-content-side-menu ">
                    <a target="main" href="/supplier/system/config/">线路资源 </a> <a
                            target="main" href="/supplier/system/config/">导游领队 </a>
                    <hr>
                    <a target="main" href="/supplier/system/enterprise/">航空公司</a> <a
                            target="main" href="/supplier/system/depts/">地接社</a> <a
                            target="main" href="/supplier/system/user/">酒店</a> <a
                            target="main" href="/supplier/system/roles/">景区</a> <a
                            target="main" href="/supplier/system/logs/">车队</a> <a
                            target="main" href="/supplier/system/admin/">签证</a> <a
                            target="main" href="/supplier/system/admin/">保险</a>
                </div>
            </div>
            <div class="report">
                <div class="page-content-side-nav">统计报表</div>
                <div class="page-content-side-menu ">
                    <a target="main" href="/supplier/system/config/">月收客分析</a><a
                            target="main" href="/supplier/system/enterprise/">月销售统计</a> <a
                            target="main" href="/supplier/system/depts/">按线路统计</a> <a
                            target="main" href="/supplier/system/user/">按地区统计</a> <a
                            target="main" href="/supplier/system/roles/">大社贡献率</a> <a
                            target="main" href="/supplier/system/logs/">回访统计</a>
                    <hr>
                    <a target="main" href="/supplier/system/admin/">日收客销售报表</a> <a
                            target="main" href="/supplier/system/admin/">月绩效表</a>
                </div>
            </div>
            <div class="system">
                <div class="page-content-side-nav">系统设置</div>
                <div class="page-content-side-menu ">

                    <a target="main" href="/supplier/system/config/">系统参数</a><a
                            target="main" href="/supplier/system/enterprise/">企业信息</a> <a
                            target="main" href="/supplier/system/dept/">部门管理</a> <a
                            target="main" href="/supplier/system/user/">用户管理</a> <a
                            target="main" href="/supplier/system/role/">角色管理</a> <a
                            target="main" href="/supplier/system/base/">基础数据</a> <a
                            target="main" href="/supplier/system/logs/">信息模板</a> <a
                            target="main" href="/supplier/system/tags/">标签管理</a> <a
                            target="main" href="/supplier/system/model/">模块权限</a>
                    <hr>
                    <a target="main" href="/supplier/system/admin/">日志分析报表</a>
                </div>
            </div>
            <div class="docking">
                <div class="page-content-side-nav">三方对接</div>
                <div class="page-content-side-menu ">
                    <a target="main" href="/supplier/system/config/">系统参数</a><a
                            target="main" href="/supplier/system/enterprise/">企业信息</a> <a
                            target="main" href="/supplier/system/depts/">部门管理</a> <a
                            target="main" href="/supplier/system/user/">用户管理</a> <a
                            target="main" href="/supplier/system/roles/">角色管理</a> <a
                            target="main" href="/supplier/system/logs/">基础数据</a> <a
                            target="main" href="/supplier/system/logs/">信息模板</a> <a
                            target="main" href="/supplier/system/logs/">信息模板</a> <a
                            target="main" href="/supplier/system/logs/">模块权限</a>
                    <hr>
                    <a target="main" href="/supplier/system/admin/">日志分析报表</a>
                </div>
            </div>
        </div>
        @yield('content')
        <div class="page-content-area">
            <iframe id="main" name="main" src="{{url("/supplier/home")}}" frameBorder="0"
                    width="100%" scrolling="auto"
                    height="100%"></iframe>
        </div>
    </div>
    <div class="page-footer">重庆爱旅游科技有限公司</div>
</div>

<script src="{{ asset('/resources/js/angularJs/angular1.5.5.min.js') }}"></script>
<script src="{{ asset('/resources/js/angularJs/angular-messages.min.js') }}"></script>
<script src="{{ asset('/resources/js/angularJs/angularBase.js') }}"></script>
<script src="{{ asset('/resources/js/jquery-2.1.1.min.js') }}"></script>
<script src="{{ asset('/resources/js/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/resources/js/layer/layer.js') }}"></script>
<script src="{{ asset('/resources/js/common.js') }}"></script>

<script type="text/javascript">

    $(function () {

        $(".page-header-nav-menu span").click(function () {
            $(".page-header-nav-menu span").removeClass("active");
            $(this).addClass("active");
            $(".page-content-side-menu").hide();
            var name = $(this).attr("name");
            //alert($(this).attr("name"));
            $("." + name + "").show();
        });

        $(".page-content-side-nav").click(function () {
            $(".page-content-side-menu").hide();
            $(this).next().show();
        });

    });
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
@yield('script')
</body>
</html>