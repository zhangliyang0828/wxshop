<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>重置密码</title>
<meta content="app-id=984819816" name="apple-itunes-app" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="black" name="apple-mobile-web-app-status-bar-style" />
<meta content="telephone=no" name="format-detection" />
<link href="css/comm.css" rel="stylesheet" type="text/css" />
<link href="css/login.css" rel="stylesheet" type="text/css" />
<link href="css/findpwd.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.11.2.min.js"></script>
</head>
<body>
    
<!--触屏版内页头部-->
<div class="m-block-header" id="div-header">
    <strong id="m-title">重置密码</strong>
    <a href="javascript:history.back();" class="m-back-arrow"><i class="m-public-icon"></i></a>
    <a href="/" class="m-index-icon"><i class="m-public-icon"></i></a>
</div>


<div class="wrapper">
    <div class="registerCon">
        <ul>
            <li>
                <s class="password"></s>
                <input type="password" id="pwd1" placeholder="请输入旧密码" value="" maxlength="26" />
                <span class="clear">x</span>
            </li>
            <li>
                <s class="password"></s>
                <input type="password" id="pwd2" placeholder="请输入新密码" value="" maxlength="26" />
                <span class="clear">x</span>
            </li>
            <li><a id="submit" href="javascript:void(0);" class="orangeBtn">确认重置</a></li>
        </ul>
    </div>

</div>

<script src="layui/layui.js"></script> 
<script>
layui.use(['layer', 'laypage', 'element'], function(){
  var layer = layui.layer
  ,laypage = layui.laypage
  ,element = layui.element(); 
 })
</script>

<script>
    $("#submit").click(function(){
      //alert(123);
      var pwd1=$("#pwd1").val();
      if(pwd1==''){
         alert('旧密码不能为空');
         return false;
      }
      var pwd2=$("#pwd2").val();
      if(pwd2==''){
          alert('新密码不能为空');
          return false;
      }
      $.ajax({
            type:'post',
            url:"reset",
            data:{pwd1:pwd1,pwd2:pwd2},
            success:function(msg){
                if(msg==1){
                alert('修改成功');
                location.href="{{url('login')}}";
                return false;
                }
                alert(msg);
            }
      })

    })
</script>

<script>
  


    function resetpwd(){
        // 密码失去焦点
        $('#verifcode').blur(function(){
            reg=/^[0-9A-Za-z]{6,16}$/;
            var that = $(this);
            if( that.val()==""|| that.val()=="6-16位数字、字母组成"){   
                layer.msg('请重置密码！');
            }else if(!reg.test(that.val())){
                layer.msg('请输入6-16位数字、字母组成的密码！');
            }
        })

    }
    resetpwd();

    $('.registerCon input').bind('keydown',function(){
        var that = $(this);
        if(that.val().trim()!=""){
            
            that.siblings('span.clear').show();
            that.siblings('span.clear').click(function(){
                that.val("");
                $(this).hide();
            })

        }else{
           that.siblings('span.clear').hide();
        }

    })

</script>
</body>
</html>
