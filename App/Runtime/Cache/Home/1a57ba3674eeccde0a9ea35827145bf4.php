<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>修改密码</title>

		<link href="/Public/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/Public/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/Public/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/Public/css/stepstyle.css" rel="stylesheet" type="text/css">

		<script type="text/javascript" src="/Public/js/jquery-1.7.2.min.js"></script>
		<script src="/Public/AmazeUI-2.4.2/assets/js/amazeui.js"></script>

	</head>

	<body>
		<!--头 -->
		<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
		<header>
			<article>
				<div class="mt-logo">
					<!--顶部导航条 -->
					<div class="am-container header">
						<ul class="message-l">
							<div class="topMessage">
								<div class="menu-hd">
									<?php if(($_SESSION['is_login']) == "1"): ?><a href="#" target="_top" class="h">你好，<?php echo (session('username')); ?></a>
										<a href="/home/login" target="_top" onclick="return confirm('确定注销吗？')"><span style="color:red">注销登陆</span></a>
									<?php else: ?>
										<a href="/home/login" target="_top" class="h">亲，请<span style="color:blue">登录<span></a>
										<a href="#" target="_top">免费<span style="color:blue">注册</a><?php endif; ?>
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
								<div class="menu-hd"><a id="mc-menu-hd" href="#" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong></a></div>
							</div>
							<div class="topMessage favorite">
								<div class="menu-hd"><a href="/index.php/Home/Information/collection" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
						</ul>
						</div>

						<!--悬浮搜索框-->

						<div class="nav white">
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

						<div class="clear"></div>
					</div>
				</div>
			</article>
		</header>
		<!-- 导航条 -->
		<div class="nav-table">
					   <div class="long-title"><span class="all-goods">全部分类</span></div>
					   <div class="nav-cont">
							<ul>
								<li class="index"><a href="#">首页</a></li>
                                <li class="qc"><a href="#">闪购</a></li>
                                <li class="qc"><a href="#">限时抢</a></li>
                                <li class="qc"><a href="#">团购</a></li>
                                <li class="qc last"><a href="#">大包装</a></li>
							</ul>
						    <div class="nav-extra">
						    	<i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
						    	<i class="am-icon-angle-right" style="padding-left: 10px;"></i>
						    </div>
						</div>
			</div>
			<b class="line"></b>
		<!-- 导航条 -->

		
	</body>

</html>
		<!-- 头 -->
		<div class="center">
			<div class="col-main">
				<div class="main-wrap">

					<div class="am-cf am-padding">
						<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">修改密码</strong> / <small>Password</small></div>
					</div>
					<hr/>
					<!--进度条-->
					<div class="m-progress">
						<div class="m-progress-list">
							<span class="step-1 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">1<em class="bg"></em></i>
                                <p class="stage-name">重置密码</p>
                            </span>
							<span class="step-2 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">2<em class="bg" id="finish"></em></i>
                                <p class="stage-name">完成</p>
                            </span>
							<span class="u-progress-placeholder"></span>
						</div>
						<div class="u-progress-bar total-steps-2">
							<div class="u-progress-bar-inner" id="progress-bar-inner"></div>
						</div>
					</div>
					<form class="am-form am-form-horizontal" name="change_password">
						<div class="am-form-group">
							<label for="user-old-password" class="am-form-label">原密码</label>
							<div class="am-form-content">
								<input type="password" id="user-old-password" name="old" placeholder="请输入原登录密码">
							</div>
						</div>
						<div class="am-form-group">
							<label for="user-new-password" class="am-form-label">新密码</label>
							<div class="am-form-content">
								<input type="password" id="user-new-password" name="new" placeholder="由数字、字母组合">
							</div>
						</div>
						<div class="am-form-group">
							<label for="user-confirm-password" class="am-form-label">确认密码</label>
							<div class="am-form-content">
								<input type="password" id="user-confirm-password" placeholder="请再次输入上面的密码">
							</div>

						</div>
						<div class="info-btn">
							<div class="am-btn am-btn-danger" onclick="sub()">保存修改</div>
						</div>
						<input type="hidden" name="act" value="change" />
					</form>

				</div>
				<!--底部-->
				<!DOCTYPE html>
<html>

	<head>
	</head>
	<body>
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
		
	</body>

</html>
				<!-- 底部 -->
			</div>

			<!-- 左边 -->
			<!DOCTYPE html>
<html>
	<head>
	</head>

	<body>
		<aside class="menu">
			<ul>
				<li class="person active">
					<a href="/home/person"><i class="am-icon-user"></i>个人中心</a>
				</li>
				<li class="person">
					<p><i class="am-icon-newspaper-o"></i>个人资料</p>
					<ul>
						<li> <a href="/home/information/information.html">个人信息</a></li>
						<li> <a href="/home/information/safety.html">安全设置</a></li>
						<li> <a href="/home/information/address.html">地址管理</a></li>
						<li> <a href="/home/information/cardlist.html">快捷支付</a></li>
					</ul>
				</li>
				<li class="person">
					<p><i class="am-icon-balance-scale"></i>我的交易</p>
					<ul>
						<li><a href="/index.php/Home/Information/order">订单管理</a></li>
						<li> <a href="/index.php/Home/Information/change">退款售后</a></li>
						<li> <a href="/index.php/Home/Information/comment">评价商品</a></li>
					</ul>
				</li>
				<li class="person">
					<p><i class="am-icon-dollar"></i>我的资产</p>
					<ul>
						<li> <a href="/index.php/Home/Information/points">我的积分</a></li>
						<li> <a href="/index.php/Home/Information/coupon">优惠券 </a></li>
						<li> <a href="/index.php/Home/Information/bonus">红包</a></li>
						<li> <a href="/index.php/Home/Information/walletlist">账户余额</a></li>
						<li> <a href="/index.php/Home/Information/bill">账单明细</a></li>
					</ul>
				</li>

				<li class="person">
					<p><i class="am-icon-tags"></i>我的收藏</p>
					<ul>
						<li> <a href="/index.php/Home/Information/collection">收藏</a></li>
						<li> <a href="/index.php/Home/Information/foot">足迹</a></li>														
					</ul>
				</li>

				<li class="person">
					<p><i class="am-icon-qq"></i>在线客服</p>
					<ul>
						<li> <a href="/index.php/Home/Information/consultation">商品咨询</a></li>
						<li> <a href="/index.php/Home/Information/suggest">意见反馈</a></li>							
						
						<li> <a href="/index.php/Home/Information/news">我的消息</a></li>
					</ul>
				</li>
			</ul>
		</aside>
	</body>

</html>
			<!-- 左边 -->
		</div>
<script>
function sub(){
	var old_word = document.getElementById('user-old-password').value;
	var new_word = document.getElementById('user-new-password').value;
	var sure_word = document.getElementById('user-confirm-password').value;
	var progress = $('.u-progress-bar-inner');	//寻找进度条
	var yes_logo = $('.step-2').find('.bg');	//寻找√符号

	if( new_word.replace(/(^\s*)|(\s*$)/g, "") == '' ){
		alert("新密码不能有空格！～");
		return;
	}

	if( new_word != sure_word ){
		alert("两次密码输入不一致！");
		return;
	}

	$.post(
		'/home/information/password',
		{"old_word":old_word,"new_word":new_word},
		function(data){
			if( data == '1' ){
				progress.css("width",'100%');		//把进度条的宽度还原为100%
				setTimeout(function(){				//延迟执行函数
					yes_logo.css('opacity','1');	//消除透明度
				},1600);
				document.change_password.reset();	//成功后清空表单内容
			}else if( data == '2' ){
				alert('原密码输入错误～～');
			}else{
				alert('修改失败～～');
			}
		}
	);
}

</script>
	</body>

</html>