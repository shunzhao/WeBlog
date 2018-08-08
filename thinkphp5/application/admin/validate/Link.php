<?php
namespace app\admin\validate;
use think\Validate;
class Link extends Validate
{
    protected $rule = [
        'url|链接地址'  =>  'require',
    ];

}