<?php

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



Route::get('/', function () {
    return view('welcome');
});

route::any("index","Index@index");
route::any("indexadd","Index@indexadd");
route::any("indexlist","Index@indexlist")->middleware('login');
route::any("indexuser","Index@indexuser")->middleware('login');

route::any("login","login@login");
route::any("registershow","login@registershow");
route::post("register","login@register");
route::post("yzm","login@yzm");
route::post("save","login@save");

route::post("goodslist","goods@goodslist");
route::get("goodsadd","goods@goodsadd");
route::get("goodsgouwu","goods@goodsgouwu");
route::get("del","goods@del");

route::any("usersiteshow","user@usersiteshow");
route::post("usersite","user@usersite");
route::any("siteshow","user@siteshow");