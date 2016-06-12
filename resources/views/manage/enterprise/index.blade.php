@extends('layouts.manage')
@section("script")
    <script type="text/javascript">
        app.controller('userCtrl', function ($scope, $http) {
            $scope.init = function () {
                $http({
                    method: "get",
                    params: $scope.user,
                    url: "/manage/system/user/list.json"
                }).success(function (data, header, config, status) {
                    $scope.users = data.datas;

                }).error(function (data, header, config, status) {
                    alert(data);
                });
            }

            $scope.add = function () {
                layer.open({
                    type: 2,
                    title: '新增',
                    shade: false,
                    maxmin: true,
                    shade: 0.1,
                    area: ['70%', '70%'],
                    content: '/manage/enterprise/create/'
                });
            }
            $scope.edit = function (id) {
                layer.open({
                    type: 2,
                    title: '编辑',
                    shadeClose: true,
                    shade: false,
                    maxmin: true,
                    shade: 0.2,
                    area: ['70%', '70%'],
                    content: '/manage/system/user/edit/' + id
                });
            }

            $scope.del = function (id) {
                //询问框
                layer.confirm('确认删除？', {
                    btn: ['确认', '取消']
                    //按钮
                }, function () {
                    $.post('/manage/system/user/delete/' + id, {},
                            function (res) {
                                if (res > 0) {
                                    //删除成功提示
                                    layer.msg('成功删除' + res + '条记录！', {
                                        icon: 1
                                    });
                                    location.reload();

                                } else {
                                    layer.msg('删除失败！', {
                                        icon: 2
                                    });
                                }
                            });
                });
            }

        });
    </script>
@endsection


@section('content')


    <div class="page-list" ng-controller="userCtrl">
        <div class="row">

            <div class="col-xs-12 ">
                <div class="row page-list-search">
                    <div class="col-xs-12">

                        <form method="get" class="form-inline">
                            <select name="state" class="form-control">
                                <option value="">所有</option>
                                <option value="0">在职</option>
                                <option value="1">离职</option>
                            </select>
                            <input type="text" class="form-control" placeholder="关键字"
                                   name="Key">


                            <button class="btn btn-info" type="submit">搜索</button>
                            <button class="btn btn-primary" type="button" ng-click="add()">新增</button>

                        </form>


                    </div>

                </div>

                <div class="row">
                    <div class="col-xs-12 ">
                        <table class="table table-bordered table-hover  table-condensed">
                            <thead>
                            <tr style="text-align: center" class="text-center">
                                <th style="width: 20px"><input type="checkbox"
                                                               name="CheckAll" value="Checkid"/></th>
                                <th><a href="">姓名</a></th>
                                <th><a href="">性别</a></th>
                                <th><a href="">用户编号</a></th>
                                <th><a href="">手机号</a></th>
                                <th><a href="">所属部门</a></th>
                                <th style="width: 80px;"><a href="">状态</a></th>
                                <th style="width: 160px;">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if ($enterprises !=null && count($enterprises) > 0)

                                @foreach ($enterprises as $item)
                                    {{ $item->created_at }}
                                    <tr>
                                        <td><input type="checkbox" value="{{$item->Id}}"
                                                   name="id"/></td>

                                        <td style="text-align: center">{{$item->Name}}</td>
                                        <td style="text-align: center">

                                        </td>
                                        <td style="text-align: center">{{$item->UserCode}}</td>
                                        <td style="text-align: center">{{$item->Mobile}}</td>
                                        <td style="text-align: center">{{$item->SystemDepts().getName}}</td>

                                        <td style="text-align: center">

                                        </td>
                                        <td><span class="a" ng-click="edit('{{$item->Id}}')">编辑</span>
                                            | <span class="a" ng-click="del('{{$item->Id}}')">删除</span>
                                            | <span class="a" ng-click="setpass('{{$item->Id}}')">重置密码</span></td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-xs-6">
                                <button class="btn btn-warning " type="submit" name="Delete"
                                        onclick="javascript: return confirm('确定要删除选中的信息吗?');"
                                        formaction="delete">批量删除
                                </button>
                            </div>
                            <div class="col-xs-6 text-right">

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection