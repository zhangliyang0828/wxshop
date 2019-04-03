<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0" />
    <title>我的潮购</title>
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <link rel="stylesheet" href="{{url('css/mui.min_1.css')}}">
    <link href="css/mywallet.css" rel="stylesheet" type="text/css" />
    <link href="{{url('css/comm.css')}}" rel="stylesheet" type="text/css" /><link href="{{url('css/member.css')}}" rel="stylesheet" type="text/css" /><script src="{{url('js/jquery190_1.js')}}" language="javascript" type="text/javascript"></script>
</head>
<body class="g-acc-bg">
    
    <div class="welcome" style="display: none">
        <p>Hi，等你好久了！</p>
        <a href="" class="orange">登录</a>
        <a href="" class="orange">注册</a>
    </div>

    <div class="welcome">
        <i class="set"></i>
        <div class="login-img clearfix">
            <ul>
                <li><img src="images/goods2.jpg" alt=""></li>
                <li class="name">
                    <h3>张先生</h3>
                    <p>ID：666</p>
                </li>
                <li class="next fr"><s></s></li>
            </ul>
        </div>
        <div class="chao-money">
            <ul class="clearfix">
                <li class="br">
                    <p>潮购值</p>
                    <span>888</span>
                </li>
                <li class="br">
                    <p>余额（元）</p>
                    <span>9999</span>
                </li>
                <li>
                    <a href="" class="recharge">去充值</a>
                </li>
            </ul>
        </div>

    </div>
    <!--获得的商品-->
    
    <!--导航菜单-->
    
    <div class="sub_nav marginB person-page-menu">
        <a href="/v44/member/goodsbuylist.do"><s class="m_s1"></s>待支付<i></i></a>
        <a href="/v44/member/orderlist.do"><s class="m_s2"></s>待发货<i></i></a>
        <a href="/v44/member/postlist.do"><s class="m_s3"></s>待收货<i></i></a>
        <a href="/v44/member/goodsbuylist.do"><s class="m_s1"></s>待评论<i></i></a>
        <a href="/v44/member/orderlist.do"><s class="m_s2"></s>购买记录<i></i></a>
        <a href="{{url('resetshow')}}"><s class="m_s3"></s>密码修改<i></i></a>
        <a href="{{url('usersiteshow')}}"><s class="m_s5"></s>收货添加<i></i></a>
        <a href="{{url('siteshow')}}"><s class="m_s5"></s>地址管理<i></i></a>
    </div>
    <div class="quit">
            <a href="{{url('esc')}}"><h3>退出</h3></a>
    </div>
<div class="footer clearfix">
    <ul>
        <li class="f_home"><a href="{{url('index')}}" ><i></i>潮购</a></li>
        <li class="f_announced"><a href="{{url('indexadd')}}" ><i></i>所有商品</a></li>
        <li class=""><a href="#" class="hover"><h2>购</h2></a></li>
        <li class="f_car"><a id="btnCart" href="{{url('indexlist')}}" ><i></i>购物车</a></li>
        <li class="f_personal"><a href="{{url('indexuser')}}"  class="hover" ><i></i>我的潮购</a></li>
    </ul>
</div>

    <script>
        function goClick(obj, href) {
            $(obj).empty();
            location.href = href;
        }
        if (navigator.userAgent.toLowerCase().match(/MicroMessenger/i) != "micromessenger") {
            $(".m-block-header").show();
        }
    </script>
</body>
</html>
