<?php
namespace app\Models;
use think\Model;
class Link extends Model
{
	protected $createTime = 'created_at';
	protected $updateTime = 'updated_at';
	protected $autoWriteTimestamp = true;
}