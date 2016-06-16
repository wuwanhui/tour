<fieldset>
    <legend>基本信息</legend>
    {!! csrf_field() !!}
    <input id="id" name="id" type="hidden" value="{{$role->id}}"/>
    <div class="form-group">
        <label for="name" class="col-xs-2 control-label label-required">角色标识：</label>
        <div class="col-xs-10">
            <input id="name" name="name" class="form-control" type="text"
                   value="{{$role->name}}"
                   style="width: 300px;"/>

        </div>
    </div>

    <div class="form-group">
        <label for="display_name"
               class="col-xs-2 control-label label-required">显示名称：</label>
        <div class="col-xs-10">
            <input id="display_name" name="display_name" class="form-control"
                   style="width: 300px;"
                   value="{{$role->display_name}}" type="text"/>

        </div>
    </div>

    <div class="form-group">
        <label for="description"
               class="col-xs-2 control-label label-required">描述：</label>
        <div class="col-xs-10">
                                            <textarea id="description" name="description" class="form-control"
                                                      style="width: 100%;height: 100px;">{{$role->description}}</textarea>

        </div>
    </div>


</fieldset>