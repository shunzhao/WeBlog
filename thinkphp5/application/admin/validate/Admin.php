<?php
namespace app\admin\validate;
use think\Validate;
class Admin extends Validate
{
    protected $rule = [
    	'uname|用户名'=>'require',
    	'pwd|密码'=>'require',
        'cpwd|确认密码'=>'require|confirm:pwd',
    ];
}