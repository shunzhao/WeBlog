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
		然后在application目录下找到database.php文件 将下列配置信息修改成你数据库中对应的信息<br>
		'type'            => 'mysql',
		'hostname'        => 'localhost',
		'database'        => 'blog',
		'username'        => 'root',
		'password'        => 'root',

		后台默认登录地址  http://域名/login<br>
		后台默认管理地址  http://域名/admin<br>
		后台默认账号密码  账:admin 密:admin<br>

		2018-07-31  v1.0版


Copyright ©  zhaoshun.org