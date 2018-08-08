@extends('layouts.admin')
@section('title', '文章管理 - Powered by shunzi!')
@section('content')
<br>
<div class="weui-search-bar" id="searchBar">
    <form class="weui-search-bar__form" action="{{ action('AdminController@Search') }}" method="GET">
        <div class="weui-search-bar__box">
            <i class="weui-icon-search"></i>
            <input type="search" name="keywords" class="weui-search-bar__input" id="searchInput" placeholder="搜索" required/>
            <input type="hidden" name="ac" value="admin">
            <a href="javascript:" class="weui-icon-clear" id="searchClear"></a>
        </div>
        
        <label class="weui-search-bar__label" id="searchText">
            <i class="weui-icon-search"></i>
            <span>搜索</span>
        </label>
    </form>
    <a href="javascript:" class="weui-search-bar__cancel-btn" id="searchCancel">取消</a>
</div>

<div class="weui-cells">
    @foreach ($data as $row)
        @unless ($row->id == 1)
            <div class="weui-cell weui-cell_swiped">
                <div class="weui-cell__bd"  style="transform: translateX(-68px)">
                    <div class="weui-cell">
                        <div class="weui-cell__bd">
                            <p style="padding-left: 68px;">{{ $row->title }}</p>
                        </div>
                        <div class="weui-cell__ft">
                            <a href="{{ action('AdminController@postModify', ['id' => $row->id ]) }}">编辑</a>
                        </div>
                    </div>
                </div>
                <div class="weui-cell__ft">
                    <a class="weui-swiped-btn weui-swiped-btn_warn" href="{{ action('AdminController@delete', ['C' => 'post', 'id' => $row->id ]) }}">删除</a>
                </div>
            </div>
        @endunless
    @endforeach
    <hr>
    <div class="weui-cell weui-cell_swiped">
        <div class="weui-cell__bd"  style="transform: translateX(-68px)">
            <div class="weui-cell">
                <div class="weui-cell__bd">
                    <p style="padding-left: 68px;">关于</p>
                </div>
                <div class="weui-cell__ft">
                    <a href="{{ action('AdminController@postModify', ['id' => 1 ]) }}">编辑</a>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@isset($kwd)
        {{ $data->appends(['ac' => 'admin', 'keywords'=>"$kwd"])->links() }}
    @else
        {{ $data->links() }}
    @endisset  
@endsection