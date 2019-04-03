<!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>登录</title>
    <meta content="app-id=984819816" name="apple-itunes-app" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <link href="{{url('css/comm.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('css/login.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('css/vccode.css')}}" rel="stylesheet" type="text/css" />
</head>
<body>
    
<!--触屏版内页头部-->
<div class="m-block-header" id="div-header">
    <strong id="m-title">登录</strong>
    <a href="javascript:history.back();" class="m-back-arrow"><i class="m-public-icon"></i></a>
    <a href="/" class="m-index-icon"><i class="home-icon"></i></a>
</div>

<div class="wrapper">
    <div class="registerCon">
        <div class="binSuccess5">
            <ul>
                <li class="accAndPwd">
                    <dl>
                        <div class="txtAccount">
                            <input id="txtAccount" type="text" placeholder="请输入您的手机号码/邮箱" name=""><i></i>
                        </div>
                        <cite class="passport_set" style="display: none"></cite>
                    </dl>
                    <dl>
                        <input id="txtPassword" type="password" placeholder="密码" value="" maxlength="20" /><b></b>
                    </dl>
                </li>
            </ul>
            <a id="btnLogin" href="javascript:;" class="orangeBtn loginBtn">登录</a>
        </div>
        <div class="forget">
            <a href="">忘记密码？</a><b></b><a href="{{url('registershow')}}">新用户注册</a>
        </div>
    </div>
    <div class="oter_operation gray9" style="display: none;">
        
        <p>登录666潮人购账号后，可在微信进行以下操作：</p>
        1、查看您的潮购记录、获得商品信息、余额等<br />
        2、随时掌握最新晒单、最新揭晓动态信息
    </div>
</div>
<script src="js/jquery-1.11.2.min.js"></script>
<script>
    //登录
    $("#btnLogin").click(function(){
        //alert(123123);
        var tel=$('#txtAccount').val();
        //console.log(user_tel);
        var myreg=/^[1][3,4,5,7,8][0-9]{9}$/;
        if(tel==''){
    		alert('请输入手机号');
            return false;
    	}else if(!myreg.test(tel)){
            alert('手机号不正确请重新输入');
            return false;
        }
        var pwd=$('#txtPassword').val();
        if(pwd==''){
            alert('请输入密码');
            return false;
        }
        $.ajax({
            type:'post',
            url:"save",
            data:{user_tel:tel,user_pwd:pwd},
        }).done(function(res){
            if(res==3){
                alert('账号或密码有误');
                return false;
            }else if(res==2){
                alert('账号或密码有误');
                return false;
            }else if(res==1){
                location.href="{{url('index')}}";
                return false;
            }
            alert('账号或密码有误');
        })

    })

</script> 

</body>
</html>
