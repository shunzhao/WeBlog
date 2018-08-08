@extends('layouts.admin')
@section('headers')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('title', '网站管理 - Powered by shunzi!')
@section('content')
<div class="weui-toptips weui-toptips_warn js_tooltips" style="display: none;"></div>
<div class="weui-cells__title">网站信息设置</div>
<form action="/admin/webModify" method="POST">
    <div class="weui-cells weui-cells_form">
        <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">网站标题：</label></div>
            <div class="weui-cell__bd">
                <input class="weui-input webname" value="{{ $data->title }}" name="title" type="text" placeholder="请输入网站标题"/>
            </div>
        </div>
        <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">网站副标题：</label></div>
            <div class="weui-cell__bd">
                <input class="weui-input webname" value="{{ $data->subname }}" name="subname" type="text" placeholder="请输入网站副标题，可不填"/>
            </div>
        </div>
        <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">网站关键字：</label></div>
            <div class="weui-cell__bd">
                <input class="weui-input webkeywords" value="{{ $data->keywords }}" name="keywords" type="text" placeholder="请输入网站关键字"/>
            </div>
        </div>
        <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">网站描述：</label></div>
            {{ csrf_field() }}
            <div class="weui-cell__bd">
                <input class="weui-input webdescription" value="{{ $data->description }}" name="description" type="text" placeholder="请输入网站描述"/>
            </div>
        </div>
        <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">统计代码：</label></div>
            <div class="weui-cell__bd">
                <input class="weui-input webtj" value="{{ $data->tj }}" name="tj" type="text" placeholder="请输入统计代码,不填请留空！"/>
            </div>
        </div>
    </div>
    <div class="weui-btn-area">
        <button class="weui-btn weui-btn_primary" id="showTooltips">修改</button>
    </div>
</form>
@endsection