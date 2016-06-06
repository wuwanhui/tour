@extends('layouts.app')

@section('title', '工作台')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('/resources/css/home.css') }}">
@endsection
@section('script')
    <script src="{{ asset('/resources/js/home.js') }}"></script>
@endsection

@section('content')
    <div class="page">
        <div class="page-header">
            <div class="page-header-top">
                <div class="page-header-top-logo">千番旅行</div>
                <div class="page-header-top-nav">
                    <span class="a" onclick="exit();">退出</span> | <span class="a"
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
                    <a href="/manage/business/" target="main"
                       id="model-business">业务中心</a> <a href="/manage/customer/"
                                                       target="main" id="model-customer">客服关系</a> <a
                            href="/manage/finance/" target="main" id="model-finance">财务结算</a>
                    <a href="/manage/resources/" target="main"
                       id="model-resources">资源中心</a> <a href="/manage/report/"
                                                        target="main" id="model-report">统计报表</a> <a
                            href="/manage/system/" class="active" target="main"
                            id="model-system">系统管理</a><a href="/manage/docking/"
                                                         target="main" id="model-docking">三方对接</a>


                </div>
                <form class="page-header-nav-search">
                    <input type="text" placeholder="团期、订单、客户、组团社"/> <input
                            type="submit" class="icon-search " value="搜索"/>
                </form>

                <div class="clear"></div>
            </div>
        </div>
        <div class="page-content">
            <div class="page-side">

                <div class="model-business" style="display: none;">
                    <div class="page-side-nav">业务中心</div>
                    <div class="page-side-menu">
                        <a href="/manage/activity/">增加团队</a> <a
                                href="/manage/analysis/">增加散拼</a> <a
                                href="/manage/analysis/">团队操作</a> <a
                                href="/manage/analysis/">订单列表</a> <a
                                href="/manage/analysis/">到账认领</a> <a
                                href="/manage/analysis/">收款记录</a> <a
                                href="/manage/analysis/">付款记录</a>
                        <hr/>
                        <a href="/manage/activity/">控位管理</a> <a
                                href="/manage/analysis/">团队成本</a>
                    </div>
                </div>
                <div class="model-customer" style="display: none;">
                    <div class="page-side-nav">客户关系</div>
                    <div class="page-side-menu">
                        <a href="/manage/crm/directories/">资源名录</a> <a
                                href="/manage/crm/customer/">客户档案</a> <a
                                href="/manage/crm/following/">联系记录</a> <a
                                href="/manage/crm/orders/">订单管理</a> <a
                                href="/manage/crm/product/">产品管理</a> <a
                                href="/manage/crm/logs/">业务分析</a>
                    </div>
                </div>
                <div class="model-finance" style="display: none;">
                    <div class="page-side-nav">财务结算</div>
                    <div class="page-side-menu">
                        <a href="/manage/finance/detailed/">单团明细台帐</a> <a
                                href="/manage/finance/detailed/">封团结算审核</a> <a
                                href="/manage/finance/detailed/">付款管理</a> <a
                                href="/manage/finance/detailed/">付款审核</a> <a
                                href="/manage/finance/detailed/">收款管理</a> <a
                                href="/manage/finance/detailed/">发票管理</a> <a
                                href="/manage/finance/detailed/">现金日记帐</a> <a
                                href="/manage/finance/detailed/">科目管理</a> <a
                                href="/manage/finance/detailed/">绩效管理</a> <a
                                href="/manage/finance/detailed/">积分管理</a>
                        <hr/>
                        <a href="#/manage/finance/analysis/">财务分析</a>
                    </div>
                </div>
                <div class="model-resources" style="display: none;">
                    <div class="page-side-nav">资源中心</div>
                    <div class="page-side-menu">
                        <a href="/manage/system/config/">线路资源 </a> <a
                                href="/manage/system/config/">导游领队 </a>
                        <hr>
                        <a href="/manage/system/enterprise/">航空公司</a> <a
                                href="/manage/system/depts/">地接社</a> <a
                                href="/manage/system/user/">酒店</a> <a
                                href="/manage/system/roles/">景区</a> <a
                                href="/manage/system/logs/">车队</a> <a
                                href="/manage/system/admin/">签证</a> <a
                                href="/manage/system/admin/">保险</a>
                    </div>
                </div>
                <div class="model-report" style="display: none;">
                    <div class="page-side-nav">统计报表</div>
                    <div class="page-side-menu">
                        <a href="/manage/system/config/">月收客分析</a><a
                                href="/manage/system/enterprise/">月销售统计</a> <a
                                href="/manage/system/depts/">按线路统计</a> <a
                                href="/manage/system/user/">按地区统计</a> <a
                                href="/manage/system/roles/">大社贡献率</a> <a
                                href="/manage/system/logs/">回访统计</a>
                        <hr>
                        <a href="/manage/system/admin/">日收客销售报表</a> <a
                                href="/manage/system/admin/">月绩效表</a>
                    </div>
                </div>
                <div class="model-system">
                    <div class="page-side-nav">系统设置</div>
                    <div class="page-side-menu">

                        <a href="/manage/system/config/" target="main">系统参数</a><a
                                href="/manage/system/enterprise/" target="main">企业信息</a> <a
                                href="/manage/system/depts/" target="main">部门管理</a> <a
                                href="/manage/system/user/" target="main">用户管理</a> <a
                                href="/manage/system/roles/" target="main">角色管理</a> <a
                                href="/manage/system/base/" target="main">基础数据</a> <a
                                href="/manage/system/logs/" target="main">信息模板</a> <a
                                href="/manage/system/tags/" target="main">标签管理</a> <a
                                href="/manage/system/model/" target="main">模块权限</a>
                        <hr>
                        <a href="/manage/system/admin/" target="main">日志分析报表</a>
                    </div>
                </div>
                <div class="model-docking" style="display: none;">
                    <div class="page-side-nav">三方对接</div>
                    <div class="page-side-menu">

                        <a href="/manage/system/config/" target="main">系统参数</a><a
                                href="/manage/system/enterprise/" target="main">企业信息</a> <a
                                href="/manage/system/depts/" target="main">部门管理</a> <a
                                href="/manage/system/user/" target="main">用户管理</a> <a
                                href="/manage/system/roles/" target="main">角色管理</a> <a
                                href="/manage/system/logs/" target="main">基础数据</a> <a
                                href="/manage/system/logs/" target="main">信息模板</a> <a
                                href="/manage/system/logs/" target="main">信息模板</a> <a
                                href="/manage/system/logs/" target="main">模块权限</a>
                        <hr>
                        <a href="/manage/system/admin/" target="main">日志分析报表</a>
                    </div>
                </div>
            </div>
            <div class="page-area">
                <iframe id="main" name="main" frameborder=0 marginheight=0
                        allowtransparency=yes marginwidth=0 scrolling=no
                        onLoad="iFrameHeight()"></iframe>
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
@endsection