<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Tools\sms\lib\Ucpaas;

class login extends Controller
{   
    //登录展示
    public function login(){
        return view('login/login');
    }
    //登录执行
    public function save(Request $request){
        $user_tel=$request->user_tel;
        $user_pwd=$request->user_pwd;
        $res=DB::table('user')->where('user_tel',"$user_tel")->first();
        if($res==''){
            echo 2;
        }
        $user_pwd=md5($user_pwd);
        $userpwd=$res->user_pwd;
        $user_id=$res->user_id;
        if($user_pwd!==$userpwd){
            echo 3;
        }
        session(['userid'=>$user_id]);
        echo 1;
    }
    //注册
    public function registershow(){
        return view('login/register');
    }
    //注册执行
    public function register(Request $request){
        $tel=$request->tel;
        // echo($tel);die;
        $pwd=$request->pwd;
        //echo($pwd);die;
        $time=time();
        $pwd=md5($pwd);
        $yzm=$request->yzm;
        $yzms=session('code');
        $tels=session('tel');
        //echo($yzms);die;
        if($yzms != $yzm){
           echo('验证码不正确');die;
        }
        if($tels != $tel){
            echo('手机号有误');die;
         }
        $where=[
            'user_tel'=>$tel,
            'user_pwd'=>$pwd,
            'create_time'=>$time
        ];
        $res=DB::table('user')->insert($where);
        if($res){
           echo 1;
        }else{
           echo 2;
        }

    }
    //发短信
    public function yzm(Request $request)
    {   
        $address=$request->tel;//接受电话
        //echo $address;exit;
        $code=rand(100000,999999);//生成一个随机数
       
        $res=$this->sendSms($address,$code);
        //var_dump($res);die;
        if($res){
         session(['tel'=>$address]);
         session(['code'=>$code]);
            echo 1;
        }else{
            echo 2;
        }
    }
    //发短信流程
    public function sendSms($address,$code)
    {
        //填写在开发者控制台首页上的Account Sid
        $options['accountsid']='011695122b30ff689401800d5258bf5b';
        //填写在开发者控制台首页上的Auth Token
        $options['token']='d3ec1967780c134aef566a2c9022611b';

        $appid = "5a3f60c1a88645cfb29cfb921baf4983";	//应用的ID，可在开发者控制台内的短信产品下查看
        $templateid = "444708";    //可在后台短信产品→选择接入的应用→短信模板-模板ID，查看该模板ID
        $param =  $code; //验证码
        $mobile = $address;//手机号
        $uid = "666";
        $ucpass = new Ucpaas($options);
        //70字内（含70字）计一条，超过70字，按67字/条计费，超过长度短信平台将会自动分割为多条发送。分割后的多条短信将按照具体占用条数计费。
        $status = $ucpass->SendSms($appid, $templateid, $param, $mobile, $uid);
        if($status) {
            return true;
        }else{
            return false;
        }
    }
    //退出
    public function esc(){
        session()->forget('userid');
        return redirect('login');
    }
    //重置密码
    public function resetshow(){
       return view('login/pwdreset');
    }
    //重置密码
    public function reset(Request $request){
       $pwd1=$request->pwd1;
       if(empty($pwd1)){
        echo ('密码不能为空');exit;
       }
       $pwd2=$request->pwd2;
       if(empty($pwd2)){
        echo ('密码不能为空');exit;
       }
       $pwd1=md5($pwd1);
       $pwd2=md5($pwd2);
       $id=session('userid');
       $res=DB::table('user')->where(['user_id'=>$id,'user_pwd'=>$pwd1])->get();
       if(empty($res)){
           echo('密码不正确');exit;
       }
       $arr=DB::table('user')->where(['user_id'=>$id])->update(['user_pwd'=>$pwd2]);
       if($arr){
          session()->forget('userid');
          echo 1;
       }else{
        echo('修改失败');
       }

    }
    
}
