<input id="id" name="id" type="hidden" value="{{$role->id}}"/>
<div class="form-group">
    <label for="name" class="col-xs-2 control-label label-required">角色标识：</label>
    <div class="col-xs-10">
        <p class="form-control-static">{{$role->name}}</p>
    </div>
</div>

<div class="form-group">
    <label for="display_name"
           class="col-xs-2 control-label label-required">显示名称：</label>
    <div class="col-xs-10">
        <p class="form-control-static">{{$role->display_name}}</p>
    </div>
</div>

<div class="form-group">
    <label for="description"
           class="col-xs-2 control-label label-required">描述：</label>
    <div class="col-xs-10">
        <p class="form-control-static">{{$role->description}}</p>
    </div>
</div>
