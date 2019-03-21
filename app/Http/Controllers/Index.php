<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Index extends Controller
{   
    //首页
    public function index(){
        //首页全部商品
        $data=DB::table("goods")->where('goods_shelf','=','1')->get();
        return view('index.index',['data'=>$data]);
    }
    //全部商品
    public function indexadd(){
        //全部顶级分类
        $data=DB::table("category")->where('pid','=','0')->get();
        $date=DB::table("goods")->where('goods_shelf','=','1')->get();
        return view('index/indexadd',['data'=>$data,'date'=>$date]);
    }
    //购物车
    public function indexlist(){

        return view('index/indexlist');
    }
    //个人中心
    public function indexuser(){
        
        return view('index/indexuser');
    }
}
