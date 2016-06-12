@extends('layouts.page')
@section("script")
    <script>
        app.controller('userCtrl', function ($scope, $http) {
            $scope.index = parent.layer.getFrameIndex(window.name);

            $scope.submitForm = function (isValid) {
                if (!isValid) {
                    alert('验证失败');
                } else {
                    $scope.add();
                }
            };

            $scope.add = function () {
                $http({
                    method: "post",
                    dataType: "json",
                    params: $scope.data,
                    url: "/manage/enterprise/create"

                }).success(function (data, header, config, status) {
                    if (data.code != 0) {
                        alert(data.msg);
                    }
                    parent.location.reload();
                    parent.layer.msg('新增成功', {
                        icon: 4
                    });

                    parent.layer.close($scope.index);

                }).error(function (data, header, config, status) {


                    alert(data);
                });
            }

            //关闭当前
            $scope.close = function () {
                parent.layer.close($scope.index);
            }

        });
    </script>
@endsection

@section('content')
    <div class="page-input" ng-controller="userCtrl">
        <div class="row">
            <div class="col-md-12">
                <form name="form" method="Post" action="{{ URL('manage/enterprise/store') }}"
                      class="form-horizontal" enctype="multipart/form-data">
                    <div class="page-input-btn">
                        <div class="row">
                            <div class="col-xs-2  text-left">
                                <button type="button" class="btn btn-default" ng-click="close()">返回</button>
                                </button>
                                <button type="submit" class="btn  btn-primary" ng-disabled="form.$invalid">保存
                                </button>
                            </div>
                            <div class="col-xs-10 text-right">{{session('message')}}</div>
                        </div>
                    </div>
                    <div class="page-input-content">
                        <fieldset>
                            <legend>基本信息</legend>
                            {!! csrf_field() !!}
                            @if (count($parents)>0)
                                <select ng-bind="data.ParentId">
                                    @foreach($parents as $item)
                                        <option value="{{$item->Id}}">{{$item->Name}}</option>
                                    @endforeach
                                </select>
                            @endif

                            <div class="form-group">
                                <label name="Name"
                                       class="col-xs-2 control-label label-required">企业名称：
                                </label>
                                <div class="col-xs-10">
                                    <input name="Name" class="form-control" ng-bind="data.Name" ng-maxlength="20"
                                           ng-minlength="4"
                                           style="width:500px;"/>
                                    <span
                                            ng-messages="form.userCode.$error" ng-cloak> <span
                                                ng-message="required">必填项</span> <span ng-message="minlength">用户名不能少于4个字符</span>
								<span ng-message="maxlength">用户名不能大于20个字条</span>
							</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label name="ShortName"
                                       class="col-xs-2 control-label label-required">简称：
                                </label>
                                <div class="col-xs-10">
                                    <input name="ShortName" class="form-control" ng-bind="data.ShortName"
                                           style="width:300px;"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label name="Logo"
                                       class="col-xs-2 control-label label-required">标志：
                                </label>
                                <div class="col-xs-10">

                                    <hidden name="Logo" ng-bind="data.Logo"/>
                                    <input type="file" name="logoFile" id="logoFile"
                                           accept="image/*"/>

                                </div>
                            </div>
                            <div class="form-group">
                                <label name="LegalPerson"
                                       class="col-xs-2 control-label label-required">法人代表：
                                </label>
                                <div class="col-xs-10">
                                    <input name="LegalPerson" class="form-control" ng-bind="data.LegalPerson"
                                           style="width:200px;"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label name="FoundTime"
                                       class="col-xs-2 control-label label-required">成立时间：
                                </label>
                                <div class="col-xs-10">
                                    <input name="FoundTime" class="form-control" ng-bind="data.FoundTime"
                                           style="width:300px;"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label name="Phone"
                                       class="col-xs-2 control-label label-required">联系电话：
                                </label>
                                <div class="col-xs-10">
                                    <input name="Phone" class="form-control" ng-bind="data.Phone"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label name="Fax"
                                       class="col-xs-2 control-label label-required">传真号码：
                                </label>
                                <div class="col-xs-10">
                                    <input name="Fax" class="form-control" ng-bind="data.Fax"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label name="Address"
                                       class="col-xs-2 control-label label-required">地址：
                                </label>
                                <div class="col-xs-10">
                                    <input name="Address" class="form-control" ng-bind="data.Address"
                                           style="width:100%;"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label name="Slogan"
                                       class="col-xs-2 control-label label-required">企业口号：
                                </label>
                                <div class="col-xs-10">
                                    <input name="Slogan" class="form-control" ng-bind="data.Slogan"
                                           style="width:100%;"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label name="Abstract"
                                       class="col-xs-2 control-label label-required">企业简介：
                                </label>
                                <div class="col-xs-10">
                                            <textarea name="Abstract" class="form-control  " ng-bind="data.Abstract"
                                                      style="width:100%;height:100px;"></textarea>
                                </div>
                            </div>
                        </fieldset>
                    </div>

                </form>
            </div>

        </div>
    </div>
@endsection