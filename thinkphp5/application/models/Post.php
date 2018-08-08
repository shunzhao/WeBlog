<?php
namespace app\Models;
use think\Model;
class Post extends Model
{
	protected $createTime = 'created_at';
	protected $updateTime = 'updated_at';
	protected $autoWriteTimestamp = true;
	protected $dateFormat = 'Y年m月d日';
}