<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;

Route::get('/','index/Index/index');
Route::get('/post/:id','index/index/post');
Route::get('/link','index/index/link');
Route::get('/admin/[:id]','admin/index/index');
Route::get('/admin/webmgt','admin/index/webmgt');
Route::get('/admin/postmgt','admin/index/postmgt');
Route::get('/admin/linkmgt','admin/index/linkmgt');
Route::get('/admin/usermgt','admin/index/usermgt');
Route::get('/login','index/index/login');
Route::get('/admin/delete/:C/:id','admin/index/delete');
Route::get('/admin/ModifyPost/:id','admin/index/ModifyPost');
Route::get('/logout','admin/index/logout');
Route::get('/Search/:ac','index/index/Search');



Route::post('/admin/addLink','admin/index/addLink');
Route::post('/admin/Post/[:id]','admin/index/Post');
Route::post('/admin/upWebInfo','admin/index/upWebInfo');
Route::post('/admin/upUser','admin/index/upUser');
Route::post('/login','index/index/loginValidate');



return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],
];
