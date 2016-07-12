@extends('layouts.page')
@section("script")

@endsection

@section('content')
    <div class="page-list">
        <div class="row page-list-header">
            <div class="col-xs-8 text-left">
                <h4>数据字典维</h4>
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
            <div class="col-md-2 text-center">
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">基础数据分类</div>
                    @if(isset($baseTypes))
                        <ul class="list-group">
                            @foreach($baseTypes as $item)
                                <li class="list-group-item"><a
                                            href="{{url('/manage/system/base/list/'.$item->id)}}"> {{$item->name}}
                                        ({{$item->code}})

                                    </a><span class="badge">{{count($item->datas)}}</span></li>
                            @endforeach
                        </ul>
                    @endif

                    <div class="panel-footer"><a href="{{url('/manage/system/base/type/create/')}}"
                                                 class="btn btn-primary btn-block">新增分类</a></div>
                </div>
            </div>
            <div class="col-md-10">
                @if(isset($baseType)&& $baseType->name!='')
                    <form method="Post" class="form-inline">
                        <fieldset>
                            <legend>"{{$baseType->name}}"基础数据明细</legend>
                            <table class="table table-bordered table-hover  table-condensed">
                                <thead>
                                <tr style="text-align: center" class="text-center">
                                    <th style="width: 20px"><input type="checkbox"
                                                                   name="CheckAll" value="Checkid"/></th>
                                    <th style="width: 80px;"><a href="">编号</a></th>
                                    <th><a href="">名称</a></th>
                                    <th><a href="">值</a></th>
                                    <th><a href="">排序</a></th>
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
                                        <td>{{$item->value}} </td>
                                        <td style="text-align: center">{{$item->sort}} </td>

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
                            <a href="{{url('/manage/system/base/create/'.$baseType->id)}}"
                               class="btn btn-primary btn-sm">新增</a>
                            <button class="btn btn-warning " type="submit" name="Delete"
                                    onclick="javascript: return confirm('确定要删除选中的信息吗?');"
                                    formaction="delete">批量删除
                            </button>
                        </div>
                        <div class="col-xs-6 text-right">
                        </div>
                    </div>
                @endif
            </div>
        </div>


    </div>
@endsection