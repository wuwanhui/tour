@extends('layouts.page')
@section("script")

@endsection

@section('content')
    <div class="page-list" style="margin-left: 10px;">
        <div class="panel panel-default">
            <div class="panel-heading">Panel heading without title</div>
            <div class="panel-body">
                Panel content
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Panel title</h3>
            </div>
            <div class="panel-body">
                Panel content
            </div>
        </div>
        <div class="well">...</div>
    </div>
@endsection