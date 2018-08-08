    <br>
    <div class="weui-footer">
        <p class="weui-footer__links">
            <a href="javascript:void(0);" class="weui-footer__link">shunzi</a>
			@if (str_is('/admin*', Request::getPathInfo()))
				<a href="{{ action('AdminController@logout') }}" class="weui-footer__link">安全退出</a>
			@endif
        </p>
        <p class="weui-footer__text">@yield('tj')</p>
        <p class="weui-footer__text">Copyright &copy; 2018 zhaoshun.org</p>
    </div>
    <script src="{{ URL::asset('js/my.js') }}"></script>
</body>
</html>