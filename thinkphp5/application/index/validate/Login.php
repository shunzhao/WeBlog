<?php
namespace app\index\validate;
use think\Validate;
class Login extends Validate
{
    protected $rule = [
    	'captcha|验证码'=>'require|captcha',
    	'uname'=>'require',
        'pwd'=>'require',
    ];

}