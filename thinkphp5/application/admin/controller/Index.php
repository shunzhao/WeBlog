<?php
namespace app\admin\Controller;
use app\admin\controller\Iflogin;
use think\Request;
use think\Loader;
use think\Session;
use app\models\Info;
use app\models\Post;
use app\models\Link;
use app\models\Admin;
class Index extends Iflogin
{
	//初始化首页
    public function index($id = 0)
    {
        if($id)
        {
            $this->assign('data', Post::get($id));
            return $this->fetch('index');
        }
        else
        {
            return $this->fetch();
        }
    }

    //初始化网站管理界面
    public function webmgt()
    {
        $this->assign('data', Info::all()[0]);
        return $this->fetch();
    }

    //初始化文章管理界面
    public function postmgt()
    {
        $post = new Post();
        $this->assign('data', $post->order('id', 'desc')->paginate(5, true));
        return $this->fetch();
    }

    //初始化友情管理界面
    public function linkmgt()
    {
        $this->assign('data', Link::all());
        return $this->fetch();
    }

    //初始化用户管理界面
    public function usermgt()
    {
        return $this->fetch();
    }

    //增加友情
    public function addLink(Request $request)
    {
        $url = input('post.Linkurl');
        $data = [
            'url'=>$url
        ];
        $validate = Loader::validate('Link');
        if(!$validate->check($data)){
            return $this->error($validate->getError());
        }
        $file = request()->file('Linkimg');
	    if($file){
	        $info = $file->validate(['ext'=>'jpg,png,gif,ico'])->move(ROOT_PATH . 'public/static' . DS . 'upload');
	        if($info){
	            $logo = $info->getSaveName();
	        }else{
	            return $this->error($file->getError());
	        }
	    }
        $link = new Link();
        $link->title = input('post.Linktitle');
        $link->url = '//'.$url;
        $link->logo = $logo;
        if($link->save())
        {
            return $this->success('新增成功');
        }
        return $this->error('操作失败，请重试');
    }

    //更新网站信息
    public function upWebInfo(Request $request)
    {
        $web = new Info();
		$result = $web->save([
		    'title'  => input('post.title'),
		    'subname'  => input('post.subname'),
		    'keywords' => input('post.keywords'),
		    'description' => input('post.description'),
		    'tj' => input('post.tj')
		],['id' => 1]);
        if($result)
        {
            return $this->success('更新成功');
        }
        return $this->error('更新失败，请重试');
    }

    //更新用户
    public function upUser(Request $request) 
    {
    	$admin = new Admin();
    	$uname = input('post.uname');
        $pwd = input('post.pwd');
        $cpwd = input('post.cpwd');
        $data = [
        	'uname'=>$uname,
            'pwd'=>$pwd,
            'cpwd'=>$cpwd
        ];
        $validate = Loader::validate('Admin');
        if(!$validate->check($data)){
            return $this->error($validate->getError());
        }
        $result = $admin->save([
		    'username'  => $uname,
		    'password'  => md5($cpwd.'Sz')
		],['username' => Session::get('Admin')]);
        if($result)
        {
        	Session::delete('Admin');
            return $this->success('更新成功,请重新登录！', '/login');
        }
        return $this->error('更新失败，请重试');
    }

    //根据id和名称删除
    public function delete($C,$id)
    {
        if($C == 'post')
        {
            if(Post::destroy($id))
            {
                return $this->success('删除成功');
            }
            return $this->error('删除失败，请重试');
        }
        else if($C == 'link')
        {
            if(Link::destroy($id))
            {
                return $this->success('删除成功');
            }
            return $this->error('删除失败，请重试');
        }
        return $this->error('非法请求');
    }

    //帖子的发布与修改
    public function Post(Request $request)
    {
        $title = input('post.title');
        $data = [
            'title'=>$title
        ];
        $validate = Loader::validate('Post');
        if(!$validate->check($data)){
            return $this->error($validate->getError());
        }
        if(!input('post.id'))
        {
            $post = new Post();
            $post->title = $title;
            $post->content = input('post.content');
            $post->excerpt = mb_substr(input('post.excerpt'), 0, 180, "utf-8");
            if($post->save())
            {
                return json(['code'=>1,'message'=>'发布成功']);
            }
            return json(['code'=>0,'message'=>'发布失败，请尝试重试']);
        }
        else
        {
            $post = Post::get(input('post.id'));
            $post->title = input('post.title');
            $post->content = input('post.content');
            $post->excerpt = mb_substr(input('post.excerpt'), 0, 180, "utf-8");
            if($post->save())
            {
                return json(['code'=>1,'message'=>'修改成功']);
            }
            return json(['code'=>0,'message'=>'修改失败，请尝试重试']);
        }
    }

    //安全退出
    public function logout()
    {
        Session::delete('Admin');
        return $this->redirect('/login');
    }
}
