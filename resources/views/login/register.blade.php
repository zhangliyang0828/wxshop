<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>注册验证</title>
<meta content="app-id=984819816" name="apple-itunes-app" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="black" name="apple-mobile-web-app-status-bar-style" />
<meta content="telephone=no" name="format-detection" />
<link href="css/comm.css" rel="stylesheet" type="text/css" />
<link href="css/login.css" rel="stylesheet" type="text/css" />
<link href="css/findpwd.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="layui/css/layui.css">
<link rel="stylesheet" href="css/modipwd.css">
<script src="js/jquery-1.11.2.min.js"></script>
</head>
<body>
    
<!--触屏版内页头部-->
<div class="m-block-header" id="div-header">
    <strong id="m-title"></strong>
    <a href="javascript:history.back();" class="m-back-arrow"><i class="m-public-icon"></i></a>
    <a href="/" class="m-index-icon"><i class="m-public-icon"></i></a>
</div>



    <div class="wrapper">
        <form class="layui-form" action="">
            <div class="registerCon">
                <ul>
                    <li>
                        <dl>
                            <input id="userMobile" maxlength="11" type="number" placeholder="请输入您的手机号码" value="" />
                        </dl>
                    </li>
                    <li>
                        <input type="text" id="yzm" placeholder="请输入验证码" value=""/>
                        <a href="javascript:void(0);" class="sendcode" id="btn">获取验证码</a>
                    </li>
                    <li>
                        <dl>
                            <input class="pwd" maxlength="11" type="password" placeholder="6-16位数字、字母组成" value="" />
                        </dl>
                    </li>
                    <li>
                        <dl>
                            <input class="conpwd" maxlength="11" type="password" placeholder="请确认密码" value="" />
                        </dl>
                    </li>
                    <li><a id="btnNext" href="javascript:void(0);" class="orangeBtn">确认</a></li>
                </ul>
            </div>
        </form>
    </div>


<script src="layui/layui.js"></script>
<script>
    //点击获取验证码
    $("#btn").click(function(){
        var tel=$('#userMobile').val();
        var myreg=/^[1][3,4,5,7,8][0-9]{9}$/;
        if(tel==''){
    		alert('请输入手机号');
    	}else if(!myreg.test(tel)){
            alert('手机号不正确请重新输入');
        }
        //$("#userMobile").value(tel);
       // var _token=$("#_token").val();
        $.ajax({
            type:'post',
            url:"yzm",
            data:{tel:tel},
        }).done(function(res){
            console.log(res);
            if(res==1){
                alert('发送成功');
            }else{
                alert('发送失败');
            };
        })

    })
    //提交
    $('#btnNext').click(function(){
        var tel=$('#userMobile').val();
        var myreg=/^[1][3,4,5,7,8][0-9]{9}$/;
        var yzm=$('#yzm').val();
        var pwd=$('.pwd').val();
        var conpwd=$('.conpwd').val()
    	if(tel==''){
    		alert('请输入手机号');
    	}else if(!myreg.test(tel)){
    		alert('请输入正确手机号');
    	}else if(yzm==''){
    		alert('请您输入验证码');
    	}else if(pwd==''){
    		alert('请输入您的密码!');
    	}else if(conpwd==''){
    		alert('请您确认密码！');
    	}
        if(pwd!==conpwd){
            alert('您俩次输入的密码不一致哦！');
        }
        $.ajax({
            type:'post',
            url:"register",
            data:{tel:tel,yzm:yzm,pwd:pwd},
        }).done(function(res){
            if(res==1){
                alert('注册成功');
                location.href="{{url('login')}}";
            }else{
                alert(res);
            };
        })
    })
  

</script>    

</body>
</html>
    