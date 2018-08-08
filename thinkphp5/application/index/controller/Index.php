<?php
namespace app\index\controller;
use think\Controller;
use think\Loader;
use think\Request;
use think\Session;
use app\models\Post;
use app\models\Admin;
use app\models\Info;
use app\models\Link;
class Index extends Controller
{
	//初始化首页
    public function index()
    {
        $post = new Post();
        $this->assign('data', $post->order('id', 'desc')->paginate(5, true));
        $this->assign('info', Info::all()[0]);
    	return $this->fetch();
    }

    //根据id初始化文章页
    public function post($id)
    {
        $data = Post::get($id);
        if($data)
        {
            $this->assign('data', $data);
            $this->assign('info', Info::all()[0]);
        	return $this->fetch();
        }
        return abort(404);
    }

    //初始化友情
    public function link()
    {
        $this->assign('info', Info::all()[0]);
        $this->assign('data', Link::all());
    	return $this->fetch();
    }

    //初始化登录页面
    public function login()
    {
        return $this->fetch();
    }

    //登录判断
    public function loginValidate(Request $request)
    {
        $uname = input('post.uname');
        $pwd = input('post.pwd');
        $code = input('post.captcha');
        $data = [
            'captcha' => $code,
            'uname' => $uname,
            'pwd' => $pwd
        ];
        $validate = Loader::validate('Login');
        if(!$validate->check($data)){
            return json(['code'=>0,'msg'=>$validate->getError()]);
        }
        if(Admin::get(['username' => $uname, 'password' => md5($pwd.'Sz')]))
        {
            Session::set('Admin',$uname);
            return json(['code'=>1,'msg'=>'登录成功']);
        }
        return json(['code'=>0,'msg'=>'账号或密码错误']);
    }

    //搜索页面
    public function Search(Request $request,$ac = null)
    {
        $keywords = input('get.keywords');
        $this->assign('info', Info::all()[0]);
        $post = new Post();
        if($ac == 'i')
        {
            $this->assign('data', $post->where('title', 'like', "%$keywords%")->order('id', 'desc')->paginate(5, true, ['query'=>request()->only('keywords')]));
            return $this->fetch('index');
        }
        else if($ac == 'a')
        {
            $this->assign('data', $post->where('title', 'like', "%$keywords%")->order('id', 'desc')->paginate(5, true, ['query'=>request()->only('keywords')]));
            return $this->fetch('admin@postmgt');
        }
        else
        {
            return $this->error('非法请求');
        }
    }
}
