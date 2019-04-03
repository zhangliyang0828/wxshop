<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class user extends Controller
{
    //收货地址
    public function usersiteshow(){
        return view('user/usersiteshow');
    }
    //收货地址
    public function usersite(Request $request){
        $name=$request->name;
        $tel=$request->tel;
        $zhuzhi=$request->zhuzhi;
        $xiangxi=$request->xiangxi;
        $user_id=session('userid');
        // var_dump($site);exit;
        $where=[
            'address_name'=>$name,
            'address_tel'=>$tel,
            'address_desc'=>$zhuzhi,
            'address_site'=>$xiangxi,
            'user_id'=>$user_id
        ];
        $res=DB::table('address')->insert($where);
        if($res){
          echo ('保存成功');
        }
    }
    //收货地址
    public function siteshow(){
        $id=session('userid');
        //echo($id);exit;
        $where=[
            'user_id'=>$id
        ];
        $data=DB::table("address")->where($where)->get();
        // print_r($data);die;
        return view('user/siteshow',['data'=>$data]);
    }
    //收货地址
    public function del(Request $request){
        $id=$request->id;
        $res=DB::table('address')->where('address_id',$id)->delete();
        if($res){
            return redirect('siteshow'); 
        }
    }
    //设置默认收货地址
    public function address(Request $request){
     $id=$request->id;
     //echo ($addressid);exit;
     $user_id=session('userid');
     //echo ($user_id);exit;
     $res=DB::table('address')->where('user_id',$user_id)->update(['address_status'=>'2']);
     $arr=DB::table('address')->where('address_id',$id)->update(['address_status'=>'1']);
     if($arr){
         echo('修改成功');
     }
    }

}
