@include('layouts.header')
<body>
    <div class="main">
        <br>
        <h1 class="title">
            <a href="{{ action('IndexController@index') }}">{{ $Web->title }}</a>
        </h1>
        <div class="weui-search-bar" id="searchBar">
            <form class="weui-search-bar__form" action="{{ action('AdminController@Search') }}" method="GET">
                <div class="weui-search-bar__box">
                    <i class="weui-icon-search"></i>
                    <input type="search" name="keywords" class="weui-search-bar__input" id="searchInput" placeholder="搜索" required/>
                    <a href="javascript:" class="weui-icon-clear" id="searchClear"></a>
                </div>
                <label class="weui-search-bar__label" id="searchText">
                    <i class="weui-icon-search"></i>
                    <span>搜索</span>
                </label>
            </form>
            <a href="javascript:" class="weui-search-bar__cancel-btn" id="searchCancel">取消</a>
        </div>
        @yield('content')
        <div class="weui-tab">
            <div class="weui-tab__panel"></div>
            <div class="weui-tabbar">
                <a href="{{ action('IndexController@index') }}" class="weui-tabbar__item">
                    <img src="{{ URL::asset('images/post.png') }}" alt="" class="weui-tabbar__icon">
                    <p class="weui-tabbar__label">首页</p>
                </a>
                <a href="{{ action('IndexController@link') }}" class="weui-tabbar__item">
                    <img src="{{ URL::asset('images/link.png') }}" alt="" class="weui-tabbar__icon">
                    <p class="weui-tabbar__label">邻居</p>
                </a>
                <a href="{{ action('IndexController@post', ['id' => 1]) }}" class="weui-tabbar__item">
                    <img src="{{ URL::asset('images/me.png') }}" alt="" class="weui-tabbar__icon">
                    <p class="weui-tabbar__label">我</p>
                </a>
            </div>
        </div>
    </div>
@include('layouts.footer')