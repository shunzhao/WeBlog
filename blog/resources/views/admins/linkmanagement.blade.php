@extends('layouts.admin')
@section('title', '友情管理 - Powered by shunzi!')
@section('headers')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
<div class="weui-toptips weui-toptips_warn js_tooltips"></div>
<div class="weui-cells__title">增加友情链接</div>
<form action="{{ action('AdminController@addLink') }}" method="POST" enctype ="multipart/form-data">
    <div class="weui-cells weui-cells_form">
            <div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">链接名称：</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input linkname" name="title" type="text" placeholder="请输入链接名称"/>
                </div>
            </div>

            <div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">链接地址：</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input linkUrl" name="url" type="text" placeholder="请输入链接地址"/>
                </div>
            </div>

            <div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">链接图片：</label></div>
                <div class="weui-cell__bd">
                    <div class="weui-uploader__bd">
                        <ul class="weui-uploader__files" id="uploaderFiles"></ul>
                        <div class="weui-uploader__input-box">
                            <input name="linkImg" id="uploaderInput" class="weui-uploader__input" type="file" accept="image/*"/>
                        </div>
                    </div>
                </div>
            </div>
            {{ csrf_field() }}
    </div>
    <div class="weui-btn-area">
        <button class="weui-btn weui-btn_primary linkBtn">确定</button>
    </div>
</form>
<br>
<hr>
<div class="weui-cells__title">友情链接管理</div>
<div class="weui-cells">
    @foreach($data as $row)
        <div class="weui-cell weui-cell_swiped">
            <div class="weui-cell__bd"  style="transform: translateX(-68px)">
                <div class="weui-cell">
                    <div class="weui-cell__bd">
                        <p style="padding-left: 68px;">{{ $row->title }}</p>
                    </div>
                </div>
            </div>
            <div class="weui-cell__ft">
                <a class="weui-swiped-btn weui-swiped-btn_warn" href="{{ action('AdminController@delete' ,['C' => 'link', 'id' => $row->id ]) }}">删除</a>
            </div>
        </div>
    @endforeach
</div>
@endsection