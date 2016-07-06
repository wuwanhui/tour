@extends('layouts.manage')
@section("script")

@endsection

@section('content')
    <div class="page-list">
        <div class="row page-list-header">
            <div class="col-xs-8 text-left">
                <h4>数据字典维护</h4>
            </div>
            <div class="col-xs-4 text-right">

                <form method="get" cssClass="form-horizontal">
                    <div class="input-group">

                        <input type="text" class="form-control" placeholder="关键字"
                               name="key" value=""> <span class="input-group-btn">
								<button class="btn btn-default" type="submit">搜索</button>
							</span>

                    </div>
                </form>
            </div>
        </div>
        <div class="row page-list-body">
            <div class="col-md-2">
                <fieldset>
                    <legend>数据分类</legend>
                    @if(isset($baseTypes))
                        <ul>
                            @foreach($baseTypes as $item)
                                <li><a href="../base/list/{{$item->id}}"> {{$item->name}}</a></li>
                            @endforeach
                        </ul>
                    @endif
                    <a href="{{url('/manage/system/base/create/')}}"
                       class="btn btn-primary">新增分类</a>
                </fieldset>
            </div>
            <div class="col-md-10">
                <form method="Post" class="form-inline">
                    <fieldset>
                        <legend>数据列表</legend>
                        <table class="table table-bordered table-hover  table-condensed">
                            <thead>
                            <tr style="text-align: center" class="text-center">
                                <th style="width: 20px"><input type="checkbox"
                                                               name="CheckAll" value="Checkid"/></th>
                                <th style="width: 80px;"><a href="">编号</a></th>
                                <th><a href="">姓名</a></th>
                                <th><a href="">角色</a></th>
                                <th style="width: 120px;">操作</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($baseDatas as $item)
                                <tr>
                                    <td><input type="checkbox" value="{{$item->id}} "
                                               name="id"/></td>
                                    <td style="text-align: center">{{$item->id}} </td>

                                    <td>{{$item->name}} </td>
                                    <td style="text-align: center">

                                    <td style="text-align: center"><a
                                                href="{{url('/manage/system/base/edit/'.$item->id)}}">编辑</a> |
                                        <a
                                                href="{{url('/manage/system/base/delete/'.$item->id)}}">删除</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </fieldset>
                </form>
                <div class="row page-list-footer">
                    <div class="col-xs-6">
                        <a href="{{url('/manage/system/base/create/')}}"
                           class="btn btn-primary">新增基础数据</a>
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
@endsection