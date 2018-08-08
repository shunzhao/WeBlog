<?php
namespace app\admin\Controller;
use think\Controller;
use think\Session;
class Iflogin extends Controller
{
	public function _initialize(){
        if (!Session::get('Admin')) {
            $this->error('请先登录!', '/login');
        }
    }
}