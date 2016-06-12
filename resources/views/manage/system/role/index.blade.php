@extends('layouts.manage')
@section("script")

@endsection

@section('content')
    <div class="row">
        <div class="col-xs-8 text-left">
            <a href="create/" class="btn btn-primary">新增</a>
        </div>
        <div class="col-xs-4 text-right">
            <form method="get" cssClass="form-horizontal">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="关键字"
                           name="key" value="${key}"> <span class="input-group-btn">
								<button class="btn btn-default" type="submit">搜索</button>
							</span>

                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 ">
            <div class="panel panel-default">
                <div class="panel-body" id="PageList">

                    <table class="table table-bordered table-hover  table-condensed">
                        <thead>
                        <tr style="text-align: center" class="text-center">
                            <th style="width: 20px"><input type="checkbox"
                                                           name="CheckAll" value="Checkid"/></th>
                            <th style="width: 80px;"><a href="">编号</a></th>
                            <th><a href="">角色名称</a></th>
                            <th><a href="">描述</a></th>
                            <th style="width: 80px;"><a href="">状态</a></th>
                            <th style="width: 120px;">操作</th>
                        </tr>
                        </thead>
                        @if (count($roles) > 0)
                            <tbody>
                            @foreach($roles as $role)

                                <tr>
                                    <td><input type="checkbox" value="{{$role->id}}"
                                               name="id"/></td>

                                    <td style="text-align: center">{{$role->id}}</td>
                                    <td style="text-align: center">{{$role->id}}</td>

                                    <td>{{$role->id}}</td>


                                    <td style="text-align: center">


                                    </td>
                                    <td><a href="edit/${item.getId()}">编辑</a> | <a
                                                href="delete/${item.getId()}">删除</a> | <a
                                                href="permission/${item.getId()}">许可</a></td>
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
@endsection