@extends('layouts.page')
@section("script")

@endsection

@section('content')
    <div class="page-list">
        <div class="row page-list-header">
            <div class="col-xs-8 text-left">
                <a href="{{url('/supplier/system/dept/create/')}}"
                   class="btn btn-primary">新增</a>
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
                    <legend>组织机构</legend>
                    <a href="{{url('/supplier/system/dept/list/')}}"> {{session("enterprise")->name}}</a>
                    <hr/>
                    @if(isset($parents))
                        <ul>
                            @foreach($parents as $item)
                                <li><a href="../dept/list/{{$item->id}}"> {{$item->name}}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </fieldset>
            </div>
            <div class="col-md-10">
                <form method="Post" class="form-inline">
                    <fieldset>
                        <legend>部门列表</legend>
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

                            @foreach($depts as $item)
                                <tr>
                                    <td><input type="checkbox" value="{{$item->id}} "
                                               name="id"/></td>
                                    <td style="text-align: center">{{$item->id}} </td>

                                    <td>{{$item->name}} </td>
                                    <td style="text-align: center">

                                    <td style="text-align: center"><a
                                                href="{{url('/supplier/system/dept/edit/'.$item->id)}}">编辑</a> |
                                        <a
                                                href="{{url('/supplier/system/dept/delete/'.$item->id)}}">删除</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </fieldset>
                </form>
            </div>
        </div>
        <div class="row page-list-footer">
            <div class="col-xs-6">
                <button class="btn btn-warning " type="submit" name="Delete"
                        onclick="javascript: return confirm('确定要删除选中的信息吗?');"
                        formaction="delete">批量删除
                </button>
            </div>
            <div class="col-xs-6 text-right">
                {!! $depts->links() !!}
            </div>
        </div>

    </div>
@endsection