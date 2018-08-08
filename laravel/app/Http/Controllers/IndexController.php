<?php
namespace App\Http\Controllers;
use App\Post;
use App\Info;
use App\Link;
class IndexController extends Controller{
	
	//初始化 首页
	public function index()
	{
		$post = new Post();
		return view('indexs.index', ['data' => $post->orderBy('id', 'desc')->Paginate(5)]);
	}

	//根据id 初始化文章页
	public function post($id)
	{
		$post = new Post();
		$data = $post->find($id);
		if($data)
		{
			return view('indexs.post', ['data' => $data]);
		}
		else
		{
			// return response()->view('errors.404', [], 500);
			return abort(404);
		}
	}

	// 初始化 友情页
	public function link()
	{
		$link = new Link();
		return view('indexs.link', ['data' => $link->all()]);
	}
}