@extends('layouts.admin')
@section('headers')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('title', '用户管理 - Powered by shunzi!')
@section('content')
<div class="weui-toptips weui-toptips_warn js_tooltips" style="display: none;"></div>
<div class="weui-cells__title">修改用户名密码</div>
<form action="{{ action('AdminController@userModify') }}" method="POST">
    <div class="weui-cells weui-cells_form">

    	<div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">请输入账号：</label></div>
            <div class="weui-cell__bd">
                <input class="weui-input modifyuname" name="uname" type="text" placeholder="请输入用户名"/>
            </div>
        </div>

        <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">请输入密码：</label></div>
            <div class="weui-cell__bd">
                <input class="weui-input modifyPwd" name="pwd" type="text" placeholder="请输入密码"/>
            </div>
        </div>
        {{ csrf_field() }}
        <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">请确认密码：</label></div>
            <div class="weui-cell__bd">
                <input class="weui-input CModifyPwd" name="cpwd" type="text" placeholder="请再次输入密码"/>
            </div>
        </div>
    </div>
    <div class="weui-btn-area">
        <button class="weui-btn weui-btn_primary userBtn">修改</button>
    </div>
</form>
@endsection