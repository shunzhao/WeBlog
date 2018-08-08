@include('layouts.header')
    <div class="weui-tab">
        <div class="weui-navbar">
            <a href="/admin" class="weui-navbar__item">
                新增文章
            </a>
            <a href="/admin/webmgt" class="weui-navbar__item">
                网站管理
            </a>
            <a href="/admin/postmgt" class="weui-navbar__item">
                文章管理
            </a>
            <a href="/admin/linkmgt" class="weui-navbar__item">
                友情管理
            </a>
            <a href="/admin/usermgt" class="weui-navbar__item">
                用户管理
            </a>
        </div>
        <div class="weui-tab__panel">
            <div class="main">
                @yield('content')      
            </div>
        </div>
    </div>
@include('layouts.footer')