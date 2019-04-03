<!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>地址管理</title>
    <meta content="app-id=984819816" name="apple-itunes-app" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <link href="css/comm.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/address.css">
    <link rel="stylesheet" href="css/sm.css">
  
   
    
</head>
<body>
    
<!--触屏版内页头部-->
<div class="m-block-header" id="div-header">
    <strong id="m-title">地址管理</strong>
    <a href="javascript:history.back();" class="m-back-arrow"><i class="m-public-icon"></i></a>
    <a href="{{url('usersiteshow')}}" class="m-index-icon">添加</a>
</div>
<div class="addr-wrapp">

     @foreach($data as $k=>$v)
     <div class="addr-list">
          <ul>
             <li class="clearfix">
                 <span class="fl">{{$v->address_name}}</span>
                 <span class="fr">{{$v->address_tel}}</span>
             </li>
             <li>
                 <p>{{$v->address_site}}</p>
             </li>
             <li class="a-set">
                 <s class="z-defalt" addressid="{{$v->address_id}}" style="margin-top: 6px;"></s>
                 <span>设为默认</span>
                 <div class="fr">
                     <span class="remove"><a href="/del?id={{$v->address_id}}">删除</a></span>
                 </div>
             </li>
         </ul>  
     </div>
     @endforeach

</div>

<script src="js/zepto.js" charset="utf-8"></script>
<script src="js/sm.js"></script>
<script src="js/sm-extend.js"></script>
<script>
    $(".z-defalt").click(function(){
        var id=$(this).attr('addressid');
        // console.log(id);
        $.ajax({
              type:'post',
              url:"address",
              data:{id:id},
              success:function(msg){
                  console.log(msg)
              }
        })
    })
</script>
<script src="js/jquery-1.8.3.min.js"></script>
<script>
    var $$=jQuery.noConflict();
    $$(document).ready(function(){
            // jquery相关代码
            $$('.addr-list .a-set s').toggle(
            function(){
                if($$(this).hasClass('z-set')){
                    
                }else{
                    $$(this).removeClass('z-defalt').addClass('z-set');
                    $$(this).parents('.addr-list').siblings('.addr-list').find('s').removeClass('z-set').addClass('z-defalt');
                }   
            },
            function(){
                if($$(this).hasClass('z-defalt')){
                    $$(this).removeClass('z-defalt').addClass('z-set');
                    $$(this).parents('.addr-list').siblings('.addr-list').find('s').removeClass('z-set').addClass('z-defalt');
                }
                
            }
        )

    });
    
</script>


</body>
</html>
