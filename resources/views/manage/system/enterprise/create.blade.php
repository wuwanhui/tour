@extends('layouts.manage')
@section("script")

@endsection

@section('content')
    <div class="page-input">
        <div class="row">
            <div class="col-md-12">
                <form name="form" method="Post" action="{{ URL('/manage/system/enterprise/create') }}"
                      class="form-horizontal" enctype="multipart/form-data">
                    <div class="page-input-btn">
                        <div class="row">
                            <div class="col-xs-2  text-left">
                                <button type="button" class="btn btn-default">返回</button>
                                </button>
                                <button type="submit" class="btn  btn-primary">保存
                                </button>
                            </div>
                            <div class="col-xs-10 text-right">{{session('message')}}</div>
                        </div>
                    </div>
                    <div class="page-input-content">
                        <fieldset>
                            <legend>基本信息</legend>
                            @include('manage.system.enterprise._form')
                        </fieldset>
                    </div>

                </form>
            </div>

        </div>
    </div>
@endsection