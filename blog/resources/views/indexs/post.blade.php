@extends('layouts.index')
@section('title'){{ $data->title }} - {{ $Web->title }}@endsection
@section('keywords'){{ $data->title }},{{ $Web->title }}@endsection
@section('description'){{ $data->title }}是{{ $Web->title }}中的一篇文章，感谢您的阅读@endsection
@section('content')
<div class="weui-gallery" id="gallery">
    <span class="weui-gallery__img" id="galleryImg"></span>
    <div class="weui-gallery__opr">
        <a href="javascript:" class="weui-gallery__del">
            <i class="weui-icon-cancel weui-icon_gallery-cancel"></i>
        </a>
    </div>
</div>
<article class="weui-article" style="text-align: center;">
    <h1 class="title">{{ $data->title }}</h1>
    <section>
        {!! $data->content !!}
    </section>
</article>
<div style="display: none;" id="gotop"><img src="{{ asset('images/top.png') }}" width="50"></div>
@endsection
@section('tj'){{ $Web->tj }}@endsection