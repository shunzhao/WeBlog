
<!-- 
 *
 *                             _ooOoo_
 *                            o8888888o
 *                            88" . "88
 *                            (| -_- |)
 *                            O\  =  /O
 *                         ____/`---'\____
 *                       .'  \\|     |//  `.
 *                      /  \\|||  :  |||//  \
 *                     /  _||||| -:- |||||-  \
 *                     |   | \\\  -  /// |   |
 *                     | \_|  ''\---/''  |   |
 *                     \  .-\__  `-`  ___/-. /
 *                   ___`. .'  /--.--\  `. . __
 *                ."" '<  `.___\_<|>_/___.'  >'"".
 *               | | :  `- \`.;`\ _ /`;.`/ - ` : | |
 *               \  \ `-.   \_ __\ /__ _/   .-` /  /
 *          ======`-.____`-.___\_____/___.-`____.-'======
 *                             `=---='
 *          ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
 *                     佛祖保佑        永无BUG
 *             佛曰：
 *                   写字楼里写字间，写字间里程序员；
 *                   程序人员写程序，又拿程序换酒钱。
 *                   酒醒只在网上坐，酒醉还来网下眠；
 *                   酒醉酒醒日复日，网上网下年复年。
 *                   但愿老死电脑间，不愿鞠躬老板前；
 *                   奔驰宝马贵者趣，公交自行程序员。
 *                   别人笑我忒疯癫，我笑自己命太贱；
 *                   不见满街漂亮妹，哪个归得程序员？
 *
-->
<!DOCTYPE html>
<html>
<head>
    <title>后台登录 - Powered by shunzi!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="http://www.xiaodao.com/css/weui.min.css" />
    <link rel="stylesheet" href="http://www.xiaodao.com/css/my.css" />
    <script src="http://www.xiaodao.com/js/jquery.min.js"></script>
<body>
    <div class="weui-toptips weui-toptips_warn js_tooltips"></div>
	<div class="main admin">
		<br>
		<h1 class="title">{{ $Web->title }}管理页面</h1>
        <div class="weui-cells weui-cells_form">
            
            <div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">用户名：</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" name="uname" type="text" pattern='[a-zA-Z0-9]' maxlength="16" placeholder="请输入用户名"/>
                </div>
            </div>

        	<div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">密&nbsp;&nbsp;码：</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" name="pwd" type="password" maxlength="16" placeholder="请输入密码"/>
                </div>
            </div>
           
            <div class="weui-cell weui-cell_vcode">
                <div class="weui-cell__hd"><label class="weui-label">验证码：</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" name="captcha" type="text" pattern='[a-zA-Z0-9]' maxlength="4" placeholder="请输入验证码"/>
                </div>
                <div class="weui-cell__ft">
                    <img class="weui-vcode-img" src="{{ captcha_src() }}" onclick="this.src='{{ captcha_src() }}'+Math.random()" />
                </div>
            </div>

        </div>
        <div class="weui-btn-area">
            <button type="button" class="weui-btn weui-btn_primary" id="lBtn">确定</button>
        </div>
	</div>
@include('layouts.footer')