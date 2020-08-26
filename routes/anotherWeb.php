<?php
// exit('test'); //测试是否可以执行

use Illuminate\Support\Facades\Route; // 可以不引入, 但是看着下面红色, 有点强迫症
use Illuminate\Http\Request; //必须要引入

Route::any('/middleware', function (Request $request) {
  $reqData = $request->all();
  dd($reqData);
  return view('hello');
})->middleware('token');

Route::any('/tokenAndAuth', function (Request $request) {
  $reqData = $request->all();
  dd($reqData);
  return view('hello');
})->middleware('token', 'auth'); // 总是报错, 说未定义 Route [login]

Route::any('/login', function () { //但是定义该路由后,还是出现报错上面的报错, 直接访问该路由,则正常响应
  return 'this is login page';
});