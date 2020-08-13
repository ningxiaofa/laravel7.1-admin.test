<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::any('/', function (Request $request) {
    return view('welcome');
});

// Just for test
Route::any('/test', function (Request $request) {
    // return view('welcome');
    // 获取query string 以及 postman - raw - json【即application/json, 而且必须要满足json格式】
    $reqData = $request->all();
    var_dump($reqData);

    // 获取 postman - raw - Text/json..all 以及 binary 【二进制流，如传输文件】
    // $reqData = $request->getContent();
    // var_dump(file_get_contents("php://input"));

    // 转码json为数组
    // $data = json_decode($reqData, true);
    
    // return $reqData;
});

Route::any('/form', function(){
    return csrf_field();
    return '<form method="POST" action="/csrf">
            ' . csrf_field() . '
            ...
            </form>';
});


Route::post('/csrf', function(Request $request){
    return $request->all();
});


// Route::get('user/{name?}', function ($name = null) {
//     return $name;
// });

// 如果不满足条件，只会返回 404 | Not Found
Route::get('user/{name}', function ($name) {
    // $name 必须是字母且不能为空
    return $name;
})->where('name', '[A-Za-z]+');

Route::get('user/{id}', function ($id) {
    // $id 必须是数字
    return $id;
})->where('id', '[0-9]+');

// Laravel 路由组件支持除 / 之外的所有字符, 如果要在占位符中使用 / 需要通过 where 条件正则表达式显式允许
// 即 http://laravel7.1-admin.test:8888/search/william/ning  ==> william/ning
Route::get('search/{search}', function ($search) {
    return $search;
})->where('search', '.*');

// 命名路由
// 请求： http://laravel7.1-admin.test:8888/user/123/profile
// 输出结果：
// 123
// http://laravel7.1-admin.test:8888/user/1/profile
Route::get('user/{id}/profile', function ($id) {
    echo $id . PHP_EOL;
    $url = route('profile', ['id' => 1]);
    return $url;
})->name('profile');


// 路由模型绑定 - 隐式绑定
Route::get('users/{user}', function (App\User $user) {
    // 如果没有查到数据，不会执行到这里
    // if(!$user->email){
    //     return ['status' => 0, 'message' => 'not found'];
    // }
    // return ['status' => 1, 'data' => $user->email];
    
    //var_dump($user);// 跟 return $user; 结果不同, 因为是对象.存在私有属性/方法
    return $user;
});


// 学习mysql date/time/datetime/timestamp/year
Route::post('datetime', 'DateTimeController@save');
Route::get('datetime', 'DateTimeController@get');