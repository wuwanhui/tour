@extends('layouts.supplier')
@section("script")
@endsection

@section('content')
    <div class="page-content-side">
        <div class="sale submenu">
            <div class="page-content-side-nav">销售中心</div>
            <div class="page-content-side-menu ">
                <a target="main" href="/supplier/activity/">增加散拼团</a>
                <a target="main"
                   href="/supplier/activity/">增加独立成团</a> <a
                        target="main" href="/supplier/activity/">增加自由行</a>
                <hr/>
                <a
                        target="main" href="/supplier/analysis/">收客订单</a> <a
                        target="main" href="/supplier/analysis/">收款记录</a> <a
                        target="main" href="/supplier/analysis/">到账认领</a> <a
                        target="main" href="/supplier/analysis/">催款中心</a>

            </div>
        </div>
        <div class="operation submenu">
            <div class="page-content-side-nav">计调操作</div>
            <div class="page-content-side-menu ">
                <a target="main" href="/supplier/analysis/">团队操作</a>
                <a target="main" href="/supplier/operator/control/airways/">控位管理</a> <a
                        target="main" href="/supplier/analysis/">地接计划</a>
                <hr/>
                <a
                        target="main" href="/supplier/analysis/">付款管理</a> <a
                        target="main" href="/supplier/analysis/">收款管理</a>
                <a
                        target="main" href="/supplier/analysis/">团队核算</a>
                <hr/>
                <a
                        target="main" href="/supplier/analysis/">变更审核</a>
            </div>
        </div>
        <div class="customer submenu">
            <div class="page-content-side-nav">客户关系</div>
            <div class="page-content-side-menu ">
                <a target="main" href="/supplier/crm/directories/">资源名录</a> <a
                        target="main" href="/supplier/crm/customer/">客户档案</a> <a
                        target="main" href="/supplier/crm/following/">联系记录</a> <a
                        target="main" href="/supplier/crm/orders/">订单管理</a> <a
                        target="main" href="/supplier/crm/product/">产品管理</a> <a
                        target="main" href="/supplier/crm/logs/">业务分析</a>
            </div>
        </div>
        <div class="weixin submenu">
            <div class="page-content-side-nav">微信营销</div>
            <div class="page-content-side-menu ">
                <a target="main" href="/supplier/weixin/concern/">关注记录</a> <a
                        target="main" href="/supplier/weixin/menu/">个性菜单</a> <a
                        target="main" href="/supplier/weixin/template/">信息模板</a> <a
                        target="main" href="/supplier/weixin/groups/">分组管理</a> <a
                        target="main" href="/supplier/weixin/scene/">营销场景</a> <a
                        target="main" href="/supplier/weixin/kf/">多客服</a><a
                        target="main" href="/supplier/weixin/config/">参数配置</a>
            </div>
        </div>
        <div class="finance submenu">
            <div class="page-content-side-nav">财务结算</div>
            <div class="page-content-side-menu ">
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
        <div class="resources submenu">
            <div class="page-content-side-nav">资源中心</div>
            <div class="page-content-side-menu ">
                <a target="main" href="/supplier/resources/line/">线路资源 </a> <a
                        target="main" href="/supplier/resources/guide/">导游领队 </a>
                <hr>
                <a target="main" href="/supplier/resources/airways/">航空公司</a> <a
                        target="main" href="/supplier/resources/intourist/">地接社</a> <a
                        target="main" href="/supplier/resources/hotel/">酒店</a> <a
                        target="main" href="/supplier/resources/scenic/">景区</a> <a
                        target="main" href="/supplier/resources/fleet/">车队</a> <a
                        target="main" href="/supplier/resources/visa/">签证</a> <a
                        target="main" href="/supplier/resources/insurance/">保险</a>
            </div>
        </div>
        <div class="report submenu">
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
        <div class="system submenu">
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
        <div class="docking submenu">
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
@endsection