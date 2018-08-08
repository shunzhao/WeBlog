<?php
namespace app\admin\validate;
use think\Validate;
class Post extends Validate
{
    protected $rule = [
        'title|文章标题'  =>  'require|max:80',
    ];

}