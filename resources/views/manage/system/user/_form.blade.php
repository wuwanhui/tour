{!! csrf_field() !!}
<input id="id" name="id" type="hidden" value="{{$user->id}}"/>

@if($enterprises!=null &&count($enterprises)>0 )
    <div class="form-group">
        <label for="enterprise_id"
               class="col-xs-2 control-label label-required">所属企业：</label>
        <div class="col-xs-10">
            <select name="enterprise_id" class="form-control">
                <option value=" 0" style="color: #002a80;">新增企业</option>
                @foreach($enterprises as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>


        </div>
    </div>
@endif
<div class="form-group">
    <label for="name" class="col-xs-2 control-label label-required">姓名：</label>
    <div class="col-xs-10">
        <input id="name" name="name" class="form-control" type="text"
               value="{{$user->name}}"
               style="width: 300px;"/>

    </div>
</div>

<div class="form-group">
    <label for="email"
           class="col-xs-2 control-label label-required">邮箱：</label>
    <div class="col-xs-10">
        <input id="email" name="email" class="form-control"
               style="width: 300px;"
               value="{{$user->email}}" type="text"/>

    </div>
</div>


<div class="form-group">
    <label for="password"
           class="col-xs-2 control-label label-required">密码：</label>
    <div class="col-xs-10">
        <input id="password" name="password" class="form-control"
               style="width: 300px;" type="text"/>

    </div>
</div>
