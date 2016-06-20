{!! csrf_field() !!}
@if (count($parents)>0)
    <select ng-bind="enterprise.parent_id">
        @foreach($parents as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>
@endif

<div class="form-group">
    <label name="Name"
           class="col-xs-2 control-label label-required">企业名称：
    </label>
    <div class="col-xs-10">
        <input name="name" class="form-control"
               style="width:500px;"/>

    </div>
</div>
<div class="form-group">
    <label name="short_name"
           class="col-xs-2 control-label label-required">简称：
    </label>
    <div class="col-xs-10">
        <input name="short_name" class="form-control"
               style="width:300px;"/>
    </div>
</div>
<div class="form-group">
    <label name="logo"
           class="col-xs-2 control-label label-required">标志：
    </label>
    <div class="col-xs-10">

        <hidden name="logo" ng-bind="enterprise.logo"/>
        <input type="file" name="logoFile" id="logoFile"
               accept="image/*"/>

    </div>
</div>
<div class="form-group">
    <label name="legal_person"
           class="col-xs-2 control-label label-required">法人代表：
    </label>
    <div class="col-xs-10">
        <input name="legal_person" class="form-control"
               style="width:200px;"/>
    </div>
</div>
<div class="form-group">
    <label name="found_time"
           class="col-xs-2 control-label label-required">成立时间：
    </label>
    <div class="col-xs-10">
        <input name="found_time" class="form-control"
               style="width:300px;"/>
    </div>
</div>
<div class="form-group">
    <label name="phone"
           class="col-xs-2 control-label label-required">联系电话：
    </label>
    <div class="col-xs-10">
        <input name="phone" class="form-control"/>
    </div>
</div>
<div class="form-group">
    <label name="fax"
           class="col-xs-2 control-label label-required">传真号码：
    </label>
    <div class="col-xs-10">
        <input name="fax" class="form-control"/>
    </div>
</div>
<div class="form-group">
    <label name="address"
           class="col-xs-2 control-label label-required">地址：
    </label>
    <div class="col-xs-10">
        <input name="address" class="form-control"
               style="width:100%;"/>
    </div>
</div>
<div class="form-group">
    <label name="slogan"
           class="col-xs-2 control-label label-required">企业口号：
    </label>
    <div class="col-xs-10">
        <input name="slogan" class="form-control"
               style="width:100%;"/>
    </div>
</div>
<div class="form-group">
    <label name="abstract"
           class="col-xs-2 control-label label-required">企业简介：
    </label>
    <div class="col-xs-10"><textarea name="abstract" class="form-control" style="width:100%;height:100px;"></textarea>
    </div>
</div>