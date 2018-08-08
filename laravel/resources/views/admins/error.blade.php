@include('layouts.header')
@section('title', '操作失败 - Powered by shunzi!')
<div class="main">
	<div class="weui-msg">
	    <div class="weui-msg__icon-area"><i class="weui-icon-warn weui-icon_msg"></i></div>
	    <div class="weui-msg__text-area">
	        <h2 class="weui-msg__title">{{ $msg }}</h2>
	        <p class="weui-msg__desc"><strong style="color:red" id="num">3</strong>秒钟后自动跳转<br><a href="javascript:history.go(-1);">如果你的浏览器没有自动跳转，请点击这里...</a></p>
	    </div>
	</div>
</div>
<script type="text/javascript">
	window.onload = function () {
		var count = 2, num = document.getElementById('num');
		var time = window.setInterval(function (){
			num.innerText = count--;
			if(count <= 0)
			{
				window.history.back(-1);
				clearInterval(time)
			}
		}, 1000);
	};
</script>
@include('layouts.footer')