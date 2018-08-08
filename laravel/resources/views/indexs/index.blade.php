@extends('layouts.index')
@section('title'){{ $Web->title }} {{ $Web->subname }}@endsection
@section('keywords'){{ $Web->keywords }}@endsection
@section('description'){{ $Web->description }}@endsection
@section('content')
<div class="weui-panel weui-panel_access">
    @foreach($data as $row)
        @unless ($row->id == 1)
        <article class="weui-article">
            <div class="weui-media-box weui-media-box_text">
                <h1 class="weui-media-box__title">
                    <a class="article_header" href="{{ action('IndexController@post', ['id' => $row->id ]) }}">{{ $row->title }}</a>
                </h1>
                <div class="weui-media-box__desc"><p>{!! $row->excerpt !!}</p></div>
                <ul class="weui-media-box__info">
                    <li class="weui-media-box__info__meta">{{ $row->created_at->format('Y年m月d日') }}</li>
                    <li class="weui-media-box__info__meta weui-media-box__info__meta_extra">
                    	<a href="{{ action('IndexController@post', ['id' => $row->id ]) }}" class="readpost">阅读全文</a>
                	</li>
                </ul>
            </div>
        </article>
        @endunless
    @endforeach
</div>
<div style="display: none;" id="gotop"><img src="{{ asset('images/top.png') }}" width="50"></div>
@isset($kwd)
    {{ $data->appends(['keywords'=>"$kwd"])->links() }}
@else
    {{ $data->links() }}
@endisset
@endsection
@section('tj'){{ $Web->tj }}@endsection