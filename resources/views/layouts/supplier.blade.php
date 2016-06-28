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
            <div class="page-header-top-logo">千番旅行</div>
            <div class="page-header-top-nav">
                {{ Auth::user()->name }} <a href="{{url('/logout')}}">退出</a> | <span class="a"
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
                <a href="/supplier/business/" <?php echo($model === 'business' ? ' class="active"' : '');?>>业务中心</a>
                <a href="/supplier/customer/" <?php echo($model === 'customer' ? ' class="active"' : '');?>>客服关系</a>
                <a href="/supplier/weixin/" <?php echo($model === 'weixin' ? ' class="active"' : '');?>>微信营销</a>
                <a href="/supplier/finance/" <?php echo($model === 'finance' ? ' class="active"' : '');?>>财务结算</a>
                <a href="/supplier/resources/" <?php echo($model === 'resources' ? ' class="active"' : '');?> >资源中心</a>
                <a href="/supplier/report/" <?php echo($model === 'report' ? ' class="active"' : '');?>>统计报表</a>
                <a href="/supplier/system/" <?php echo($model === 'system' ? ' class="active"' : '');?>>系统管理</a>
                <a href="/supplier/docking/" <?php echo($model === 'docking' ? ' class="active"' : '');?> >三方对接</a>
            </div>
            <form class="page-header-nav-search">
                <input type="text" placeholder="团期、订单、客户、组团社"/> <input
                        type="submit" class="icon-search " value="搜索"/>
            </form>

            <div class="clear"></div>
        </div>
    </div>
    <div class="page-content  ">
        <div class="page-content-side">
            <?php if( $model === 'business'){ ?>
            <div class="page-content-side-nav">业务中心</div>
            <div class="page-content-side-menu">
                <a href="/supplier/activity/">增加团队</a> <a
                        href="/supplier/analysis/">增加散拼</a> <a
                        href="/supplier/analysis/">团队操作</a> <a
                        href="/supplier/analysis/">订单列表</a> <a
                        href="/supplier/analysis/">到账认领</a> <a
                        href="/supplier/analysis/">收款记录</a> <a
                        href="/supplier/analysis/">付款记录</a>
                <hr/>
                <a href="/supplier/activity/">控位管理</a> <a
                        href="/supplier/analysis/">团队成本</a>
            </div>
            <?php }?>
            <?php if( $model === 'customer'){ ?>
            <div class="page-content-side-nav">客户关系</div>
            <div class="page-content-side-menu">
                <a href="/supplier/crm/directories/">资源名录</a> <a
                        href="/supplier/crm/customer/">客户档案</a> <a
                        href="/supplier/crm/following/">联系记录</a> <a
                        href="/supplier/crm/orders/">订单管理</a> <a
                        href="/supplier/crm/product/">产品管理</a> <a
                        href="/supplier/crm/logs/">业务分析</a>
            </div>
            <?php }?>
            <?php if( $model === 'weixin'){ ?>
            <div class="page-content-side-nav">微信营销</div>
            <div class="page-content-side-menu">
                <a href="/supplier/weixin/concern/">关注记录</a> <a
                        href="/supplier/weixin/menu/">个性菜单</a> <a
                        href="/supplier/weixin/template/">信息模板</a> <a
                        href="/supplier/weixin/groups/">分组管理</a> <a
                        href="/supplier/weixin/scene/">营销场景</a> <a
                        href="/supplier/weixin/kf/">多客服</a><a
                        href="/supplier/weixin/config/">参数配置</a>
            </div>
            <?php }?>
            <?php if( $model === 'finance'){ ?>
            <div class="page-content-side-nav">财务结算</div>
            <div class="page-content-side-menu">
                <a href="/supplier/finance/detailed/">单团明细台帐</a> <a
                        href="/supplier/finance/detailed/">封团结算审核</a> <a
                        href="/supplier/finance/detailed/">付款管理</a> <a
                        href="/supplier/finance/detailed/">付款审核</a> <a
                        href="/supplier/finance/detailed/">收款管理</a> <a
                        href="/supplier/finance/detailed/">发票管理</a> <a
                        href="/supplier/finance/detailed/">现金日记帐</a> <a
                        href="/supplier/finance/detailed/">科目管理</a> <a
                        href="/supplier/finance/detailed/">绩效管理</a> <a
                        href="/supplier/finance/detailed/">积分管理</a>
                <hr/>
                <a href="#/supplier/finance/analysis/">财务分析</a>
            </div>
            <?php }?>
            <?php if( $model === 'resources'){ ?>
            <div class="page-content-side-nav">资源中心</div>
            <div class="page-content-side-menu">
                <a href="/supplier/system/config/">线路资源 </a> <a
                        href="/supplier/system/config/">导游领队 </a>
                <hr>
                <a href="/supplier/system/enterprise/">航空公司</a> <a
                        href="/supplier/system/depts/">地接社</a> <a
                        href="/supplier/system/user/">酒店</a> <a
                        href="/supplier/system/roles/">景区</a> <a
                        href="/supplier/system/logs/">车队</a> <a
                        href="/supplier/system/admin/">签证</a> <a
                        href="/supplier/system/admin/">保险</a>
            </div>
            <?php }?>
            <?php if( $model === 'report'){ ?>
            <div class="page-content-side-nav">统计报表</div>
            <div class="page-content-side-menu">
                <a href="/supplier/system/config/">月收客分析</a><a
                        href="/supplier/system/enterprise/">月销售统计</a> <a
                        href="/supplier/system/depts/">按线路统计</a> <a
                        href="/supplier/system/user/">按地区统计</a> <a
                        href="/supplier/system/roles/">大社贡献率</a> <a
                        href="/supplier/system/logs/">回访统计</a>
                <hr>
                <a href="/supplier/system/admin/">日收客销售报表</a> <a
                        href="/supplier/system/admin/">月绩效表</a>
            </div>
            <?php }?>
            <?php if( $model === 'system'){ ?>
            <div class="page-content-side-nav">系统设置</div>
            <div class="page-content-side-menu">

                <a href="/supplier/system/config/">系统参数</a><a
                        href="/supplier/system/enterprise/">企业信息</a> <a
                        href="/supplier/system/depts/">部门管理</a> <a
                        href="/supplier/system/user/">用户管理</a> <a
                        href="/supplier/system/roles/">角色管理</a> <a
                        href="/supplier/system/base/">基础数据</a> <a
                        href="/supplier/system/logs/">信息模板</a> <a
                        href="/supplier/system/tags/">标签管理</a> <a
                        href="/supplier/system/model/">模块权限</a>
                <hr>
                <a href="/supplier/system/admin/">日志分析报表</a>
            </div>
            <?php }?>
            <?php if( $model === 'docking'){ ?>
            <div class="page-content-side-nav">三方对接</div>
            <div class="page-content-side-menu">

                <a href="/supplier/system/config/">系统参数</a><a
                        href="/supplier/system/enterprise/">企业信息</a> <a
                        href="/supplier/system/depts/">部门管理</a> <a
                        href="/supplier/system/user/">用户管理</a> <a
                        href="/supplier/system/roles/">角色管理</a> <a
                        href="/supplier/system/logs/">基础数据</a> <a
                        href="/supplier/system/logs/">信息模板</a> <a
                        href="/supplier/system/logs/">信息模板</a> <a
                        href="/supplier/system/logs/">模块权限</a>
                <hr>
                <a href="/supplier/system/admin/">日志分析报表</a>
            </div>
            <?php }?>
        </div>
        <div class="page-content-area">
            @yield('content')
        </div>
        <div class="clear"></div>
    </div>
    <div class="page-footer">重庆爱旅游科技有限公司</div>
</div>

</body>
</html>