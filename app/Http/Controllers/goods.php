<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class goods extends Controller
{
    protected static $arrCate=[];
    
    //点击其他分类
    public function goodslist(Request $request){
        $cate_id=$request->cate_id;
        if($cate_id==9999){
            $arr=DB::table("goods")->where('goods_shelf','=','1')->get();
            return view('index/div',['arr'=>$arr]);
        }else{
            $this->get($cate_id);
            $arr=self::$arrCate;
            //print_r($arr);die;
            $arr=DB::table('goods')->whereIn('cate_id',$arr)->get();
            //print_r($arr);die;
            return view('index/div',['arr'=>$arr]);
        }
      
    
    }
    //递归
    private function get($id){
        $arrIds=DB::table('category')->select('cate_id')->where("pid",$id)->get();
        if(count($arrIds)!=0){
            foreach($arrIds as $k=>$v){
                $cateId=$v->cate_id;
                $Ids=$this->get($cateId);
                self::$arrCate[]=$Ids;
            }
        }
        if(count($arrIds)==0){
            return $id;
        }
    }
    //商品详情
    public function goodsadd(Request $request){
        $goods_id=$request->input('id');
        //echo $goods_id;exit;
        $arr=DB::table("goods")->where('goods_id',"$goods_id")->get();
        return view('goods/goodsadd',['arr'=>$arr]);
    }
    //加入购物车
    public function goodsgouwu(Request $request){

        $goods_id=$request->input('id');
        //echo $goods_id;exit;
    }
    
}
