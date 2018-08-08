自用blog系统。如果你看到了想用，请自便，但请留下版权信息。
====
		环境配置：<br>
		PHP >= 7.0.0 <br>
		OpenSSL 扩展	 <br>
		PDO 扩展 <br>
		Mbstring 扩展<br>
		Tokenizer 扩展<br>
		XML PHP 扩展<br>
		fileinfo 扩展<br>

		安装教程：将sz_blog.sql 导入数据库中<br>
		然后在根目录下找到.env文件 将下列配置信息修改成你数据库中对应的信息<br>
		如果没有这个文件则可以将.env.example文件重命名为.env 再进行以上操作<br>
		DB_HOST=localhost<br>
		DB_PORT=3306<br>
		DB_DATABASE=blog<br>
		DB_USERNAME=root<br>
		DB_PASSWORD=root<br>

		后台默认登录地址  http://域名/login<br>
		后台默认管理地址  http://域名/admin<br>
		后台默认账号密码  账:admin 密:admin<br>

		2018-08-05  v1.0版<br>


Copyright ©  zhaoshun.org