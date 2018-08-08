<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Info extends Model
{
	protected $table = 'info';
	protected $dateFormat = 'U';
	public $timestamps = false;
}