<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>付款页面</title>
<link rel="stylesheet"  type="text/css" href="/Public/AmazeUI-2.4.2/assets/css/amazeui.css"/>
<link href="/Public/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
<link href="/Public/basic/css/demo.css" rel="stylesheet" type="text/css" />

<link href="/Public/css/sustyle.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/basic/js/jquery-1.7.min.js"></script>

</head>

<body>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
	</head>
	<body>


		<!--顶部导航条 -->
		<div class="am-container header">
			<ul class="message-l">
				<div class="topMessage">
					<div class="menu-hd">
						<?php if(($_SESSION['is_login']) == "1"): ?><a href="#" target="_top" class="h">你好，<?php echo (session('username')); ?></a>
							<a href="/home/login" target="_top" onclick="return confirm('确定注销吗？')"><span style="color:red">注销登陆</span></a>
						<?php else: ?>
							<a href="/home/login.html" target="_top" class="h">亲，请<span style="color:blue">登录<span></a>
							<a href="/home/register.html" target="_top">免费<span style="color:blue">注册</a><?php endif; ?>
					</div>
				</div>
			</ul>
			<ul class="message-r">
				<div class="topMessage home">
					<div class="menu-hd"><a href="/home" target="_top" class="h">商城首页</a></div>
				</div>
				<div class="topMessage my-shangcheng">
					<div class="menu-hd MyShangcheng"><a href="/home/person" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
				</div>
				<div class="topMessage mini-cart">
					<div class="menu-hd"><a id="mc-menu-hd" href="/home/pay/shopcart" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h" style="color:orange;"></strong></a></div>
				</div>
				<div class="topMessage favorite">
					<div class="menu-hd"><a href="#" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
			</ul>
			</div>
			<script>
				$(function(){
					if( <?php echo (session('is_login')); ?> == 1 ){
						$.post(
							'/Api/Goods/differentCart',
							null,
							function(ret){
								$("#J_MiniCartNum").text(ret);
							}
						);
					}
					
				})
			</script>

			<!--悬浮搜索框-->

			<div class="nav white">
				<div class="logo"><img src="/Public/images/logo.png" /></div>
				<div class="logoBig">
					<li><img src="/Public/images/logobig.png" /></li>
				</div>
				<div class="search-bar pr">
					<a name="index_none_header_sysc" href="#"></a>
					<form>
						<input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
						<input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
					</form>
				</div>
			</div>
	</body>

</html>

<div class="clear"></div>



<div class="take-delivery">
 <div class="status">
   <h2>订单已生成，请您付款</h2>
   <div class="successInfo">
     <ul>
       <li>订单编号<em><?php echo ($data["order_id"]); ?></em></li>
       <li>付款金额<em><?php echo ($data["total_money"]); ?></em></li>
       <div class="user-info">
         <p>收货人：<?php echo ($data["receiver"]); ?></p>
         <p>联系电话：<?php echo ($data["phone"]); ?></p>
         <p>收货地址：<?php echo ($data["province"]); ?> <?php echo ($data["city"]); ?> <?php echo ($data["district"]); ?> <?php echo ($data["street"]); ?></p>

       </div>
       <a href="javascript:void(0);" id="sure_href"><button type="button" class="am-btn am-btn-danger" id="sure_pay">确定付款</button></a>
       <button type="button" class="am-btn aam-btn-secondary" style="margin-left:20px;" id="cancel_pay"><a href="javascript:void(0);" >取消订单</a></button>
            <p> 请认真核对您的收货信息，如有错误请联系客服</p>
                               
     </ul>
     <div class="option">
       <span class="info">您可以</span>
        <a href="/home/MyDeal/order.html" class="J_MakePoint">查看<span>已买到的宝贝</span></a>
        <a href="/home/MyDeal/orderinfo.html" class="J_MakePoint">查看<span>交易详情</span></a>
     </div>
    </div>
  </div>
</div>


<!--底部-->
		<div class="footer">
			<div class="footer-hd">
				<p>
					<a href="#">恒望科技</a>
					<b>|</b>
					<a href="/home">商城首页</a>
					<b>|</b>
					<a href="#">支付宝</a>
					<b>|</b>
					<a href="#">物流</a>
				</p>
			</div>
			<div class="footer-bd">
				<p>
					<a href="#">关于恒望</a>
					<a href="#">合作伙伴</a>
					<a href="#">联系我们</a>
					<a href="#">网站地图</a>
					<em>© 2015-2025 Hengwang.com 版权所有</em>
				</p>
			</div>
		</div>
		
	
<!-- 底部 -->

<script>
  $(function(){
    //确认付款事件
    $("#sure_pay").click(function(){
      var bool = window.confirm("确认支付吗？");
      if(bool!=true) return;
      $("#sure_href").attr("href","/home/pay/success?order_id=<?php echo ($data["order_id"]); ?>"); //把确认付款的href补上 
      var order_id = "<?php echo ($_GET['order_id']); ?>";
      $.get(
        '/Api/Order/payment',
        {order_id:order_id},
        function(ret){

        }
      );
    });

    // 取消订单事件
    $("#cancel_pay").click(function(){
      var bool = window.confirm("确认取消订单吗？");
      if(bool!=true) return;
      var order_id = "<?php echo ($_GET['order_id']); ?>";
      $.get(
        '/Api/Order/cancelOrder',
        {order_id:order_id},
        function(ret){
          alert("订单已取消");
          window.location.href="/home/MyDeal/order";
        }
      );
    })
  });
</script>
</body>
</html>