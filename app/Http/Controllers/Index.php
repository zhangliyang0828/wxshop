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
        $userid=session('userid');
        //echo ($userid);exit;
        $data=DB::table("history")->where('user_id',$userid)->get();
        //dd($data);
        foreach($data as $k=>$v){
            $goods_id[]=$v->goods_id;
        }
        // $goods_id=$data->goods_id;
        //dd($goods_id);exit;
        $datb=DB::table("goods")->whereIn('goods_id',$goods_id)->get();
        //dd($datb);exit;
        return view('index/indexlist',['datb'=>$datb]);
        //return view('index/indexlist');
    }
    //个人中心
    public function indexuser(){
        return view('index/indexuser');
    }
}
