@extends('layouts.manage')
@section("script")

@endsection

@section('content')
    <div class="page-list">
        <div class="row page-list-header">
            <div class="col-xs-8 text-left">

            </div>
            <div class="col-xs-4 text-right">

                <form method="get" cssClass="form-horizontal">

                </form>
            </div>
        </div>
        <div class="row page-list-body">
            <div class="col-md-12">
            </div>
        </div>
        <div class="row page-list-footer">
            <div class="col-xs-6">

            </div>
            <div class="col-xs-6 text-right">

            </div>
        </div>
        @include('common.success')

    </div>
@endsection