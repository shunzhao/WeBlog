<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Admin;
use App\Post;
use App\Info;
use App\Link;
class AdminController extends Controller{
	//首页
	public function index()
	{
		return view('admins/post');
	}

	//登录页面
	public function login()
	{
		return view('admins.login');
	}

	//初始化网站管理页面
	public function webmgt()
	{
		$info = new Info();
		return view('admins/webmanagement', ['data' => $info->find(1)]);
	}

	//初始化文章管理页面
	public function postmgt()
	{
		$post = new Post();
		return view('admins/postmanagement', ['data' => $post->orderBy('id', 'desc')->Paginate(5)]);
	}

	//初始化友情管理页面
	public function linkmgt()
	{
		$link = new Link();
		return view('admins/linkmanagement', ['data' => $link->orderBy('id', 'desc')->get()]);
	}

	//初始化用户管理页面
	public function usermgt()
	{
		return view('admins/usermanagement');
	}

	//post img upload
	public function upload(Request $request)
	{
		if ($request->hasFile('postImg') && $request->file('postImg')->isValid()) {
	        $photo = $request->file('postImg');
	        $extension = $photo->extension(); //图片类型
	        $store_result = $photo->store('images'); //图片地址
	        return response()->json([
			        'errno' => 0, 
			        'data' => ['/uploads/'.$store_result]
			]);
    	}
    	return response()->json([
			        'errno' => 1, 
			        'data' => ['']
			]);
	}

	//判断用户名密码是否匹配
	public function validationLogin(Request $request)
	{
		if($request->isMethod('post')){
			$uname = $request->input('uname');
			$pwd = md5($request->input('pwd').'Sz');
			$captcha = $request->input('captcha');
			$request->validate([
				'captcha' => 'bail|required|captcha',
				'uname' => 'required',
				'pwd' => 'required',
			],[
				'captcha.required' => '验证码不得为空',
				'captcha.captcha' => '验证码不正确',
				'uname.required' => '用户名不得为空',
				'pwd.required' => '密码不得为空',
			]);
			if(Admin::where([['username', '=', $uname], ['password', '=', $pwd]])->count())
			{
				$request->session()->put('Admin', $uname);
				return response()->json([
			        'code' => 1
			    ]);
			}
			return response()->json([
				'code' => 0,
				'msg' => '账号或密码错误！'
			]);
		}
		else
		{
			return response()->json([
				'code' => 0,
				'msg' => '系统错误请刷新后重试！'
			]);
		}
	}

	//新增帖子
	public function addPost(Request $request)
	{
		if($request->isMethod('post')){
			$title = $request->input('title');
			$request->validate([
				'title' => 'bail|required|max:80',
			],[
				'required' => ':attribute 不得为空',
				'max:80' => ':attribute 最大长度不得超过80',
			],[
				'title' => '文章标题',
			]);
			$post = new Post();
			$post->title = $title;
			$post->content = $request->input('content');
			$post->excerpt = str_limit($request->input('excerpt'), 180);
			if($post->save())
			{
				return response()->json([
					'code' => 1,
					'msg' => '添加成功!'
				]);
			}
			else
			{
				return response()->json([
					'code' => 0,
					'msg' => '添加失败，请重新添加!'
				]);
			}
		}
		else
		{
			return response()->json([
				'code' => 0,
				'msg' => '系统错误请刷新后重试！!'
			]);
		}
	}

	//修改网站信息
	public function webModify(Request $request)
	{
		if($request->isMethod('post'))
		{
			$info = new Info();
			$obj = $info->find(1);
			$obj->title = $request->input('title');
			$obj->subname = '- '.$request->input('subname');
			$obj->keywords = $request->input('keywords');
			$obj->description = $request->input('description');
			$obj->tj = $request->input('tj');
			if($obj->save())
			{
				return view('admins.success', ['msg' => '修改成功']);
			}
			return view('admins.error', ['msg' => '修改失败，请重试']);
		}
		else
		{
			return view('admins.error', ['msg' => '非法请求']);
		}
	}

	//修改帖子
	public function postModify(Request $request, $id = 0)
	{
		$post = new Post();
		if($request->isMethod('get'))
		{
			$data = $post->find($id);
			return view('admins/post', ['title' => $data->title, 'content' => $data->content, 'id' => $id]);
		}
		else if($request->isMethod('post'))
		{
			$data = $post->find($request->input('id'));
			$request->validate([
				'title' => 'bail|required|max:80',
			],[
				'required' => ':attribute 不得为空',
				'max:80' => ':attribute 最大长度不得超过80',
			],[
				'title' => '文章标题',
			]);
			$data->title = $request->input('title');
			$data->excerpt = str_limit($request->input('excerpt'), 180);
			$data->content = $request->input('content');
			if($data->save())
			{
				return response()->json([
					'code' => 1,
					'msg' => '修改成功!'
				]);
			}
			else
			{
				return response()->json([
					'code' => 0,
					'msg' => '修改失败，请尝试重试!'
				]);
			}
		}
		else
		{
			return response()->json([
				'code' => 0,
				'msg' => '系统错误请刷新后重试！!'
			]);
		}
	}

	//删除操作，根据传的控制器和id 删除对应的数据
	public function delete($C, $id)
	{
		if($C == 'post')
		{
			$result = Post::destroy($id);
		}
		else if($C == 'link')
		{
			$result = Link::destroy($id);
		}
		if($result)
		{
			return view('admins.success', ['msg' => '删除成功']);
		}
		return view('admins.error', ['msg' => '修改失败']);
	}

	//新增友情
	public function addLink(Request $request)
	{
		$title = $request->input('title');
		$url = $request->input('url');
		if ($request->hasFile('linkImg') && $request->file('linkImg')->isValid() && $url) {
	        $photo = $request->file('linkImg');
	        $extension = $photo->extension(); //图片类型
	        $img = $photo->store('images'); //图片地址
	        $link = new Link();
	        $link->title = $title;
	        $link->url = $url;
	        $link->logo = $img;
	        if($link->save())
	        {
	        	return view('admins.success', ['msg' => '添加成功']);
	        }
	        else
	        {
	        	return view('admins.error', ['msg' => '添加失败，请重试']);
	        }	
    	}
    	return view('admins.error', ['msg' => '链接地址或图片为空，请重试']);
	}

	//修改用户密码
	public function userModify(Request $request)
	{
		$request->validate([
			'pwd' => 'required',
		],[
			'required' => ':attribute 不得为空',
		],[
			'pwd' => '密码',
		]);
		$pwd = $request->input('pwd');
		$cpwd = $request->input('cpwd');
		//既然都这么写了，我也就懒得添加验证器规则了。
		if($pwd === $cpwd)
		{
			$admin = new Admin();
			$obj = $admin->where('username', $request->session()->get('Admin'))->first();
			$obj->password = md5($pwd.'Sz');
			if($obj->save())
			{
				return view('admins.success', ['msg' => '修改成功']);
			}
			return view('admins.error', ['msg' => '修改失败，请重试']);
		}
		return view('admins.error', ['msg' => '两次密码不一致']);
	}

	//根据传递的ac与关键字  搜索并返回对应的数据与视图
	public function Search(Request $request)
	{
		$kwd = $request->input('keywords');
		$ac = $request->input('ac');
		$data = Post::where('title', 'like', "%$kwd%")->orderBy('id', 'desc')->paginate(4);
		if($ac == 'admin')
		{
			return view('admins.postmanagement', ['data' => $data, 'kwd' => $kwd]);
		}
		else
		{
			return view('indexs.index', ['data' => $data, 'kwd' => $kwd]);
		}
	}

	//清除session 注销登录
	public function logout ()
	{
		session()->forget('Admin');
		return redirect('/admin');
	}
}