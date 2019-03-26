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
        //echo($user_id);exit;
        $data=DB::table('address')->whereIn('user_id',$id)->get();
        return view('user/siteshow',['data'=>$data]);

        // $datb=DB::table("address")->whereIn('user_id',$id)->get();
        // return view('index/indexlist',['datb'=>$datb]);
    }


}
