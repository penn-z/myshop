<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>账户明细</title>

		<link href="/Public/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/Public/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/Public/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/Public/css/wallet.css" rel="stylesheet" type="text/css">

		<script src="/Public/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
		<script src="/Public/AmazeUI-2.4.2/assets/js/amazeui.js" type="text/javascript"></script>

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
								<div class="menu-hd"><a href="/index.php/Home/Person/collection" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
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
						<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">账单明细</strong> / <small>Electronic&nbsp;bill</small></div>
					</div>
					<hr>
					<div class="finance">
						<div class="financeText">
							<p>可用余额:<span>¥0.0</span></p>
							<p>账户状态:<span>有效</span></p>
							<a href="safety.html">安全中心：保护账户资产安全</a>
						</div>
					</div>

					<!--交易时间	-->

					<div class="order-time">
						<label class="form-label">交易时间：</label>
						<div class="show-input">
							<select class="am-selected" data-am-selected>
								<option value="today">今天</option>
								<option value="sevenDays" selected="">最近一周</option>
								<option value="oneMonth">最近一个月</option>
								<option value="threeMonths">最近三个月</option>
								<option class="date-trigger">自定义时间</option>
							</select>
						</div>
						<div class="clear"></div>
					</div>

					<div class="walletList">

						<div class="walletTitle">
							<li class="time">创建时间</th>
								<li class="name">详情</th>
									<li class="amount">金额</th>
										<li class="balance">余额</th>
						</div>
						<div class="clear"></div>
						<div class="walletCont">
							<li class="cost">
								<div class="time">
									<p> 2016-03-12
									</p>
									<p class="text-muted"> 18:41
									</p>
								</div>
								<div class="title name">
									<p class="content">
										消费
									</p>
								</div>

								<div class="amount">
									<span class="amount-pay">-32.00</span>
								</div>
								<div class="balance">
									<span>余额：</span><em>0</em>
								</div>
							</li>

							<li>
								<div class="time">
									<p> 2016-03-06
									</p>
									<p class="text-muted"> 22:22
									</p>
								</div>
								<div class="title name">
									<p class="content">
										退款至钱包
									</p>
								</div>

								<div class="amount">
									<span class="amount-pay">+16.00</span>
								</div>
								<div class="balance">
									<span>余额：</span><em>32</em>
								</div>
							</li>

							<li class="cost">
								<div class="time">
									<p> 2016-02-28
									</p>
									<p class="text-muted"> 17:58
									</p>
								</div>
								<div class="title name">
									<p class="content">
										消费
									</p>
								</div>

								<div class="amount">
									<span class="amount-pay">-16.00</span>
								</div>
								<div class="balance">
									<span>余额：</span><em>16</em>
								</div>
							</li>

							<li class="cost">
								<div class="time">
									<p> 2016-02-14
									</p>
									<p class="text-muted"> 20:42
									</p>
								</div>
								<div class="title name">
									<p class="content">
										提现
									</p>
								</div>

								<div class="amount">
									<span class="amount-pay">-100.00</span>
								</div>
								<div class="balance">
									<span>余额：</span><em>32</em>
								</div>
							</li>

							<li>
								<div class="time">
									<p> 2016-02-02
									</p>
									<p class="text-muted"> 13:24
									</p>
								</div>
								<div class="title name">
									<p class="content">
										充值
									</p>
								</div>

								<div class="amount">
									<span class="amount-pay">+132.00</span>
								</div>
								<div class="balance">
									<span>余额：</span><em>132</em>
								</div>
							</li>
							<li class="cost">
								<div class="time">
									<p> 2016-01-30
									</p>
									<p class="text-muted"> 11:33
									</p>
								</div>
								<div class="title name">
									<p class="content">
										提现
									</p>
								</div>

								<div class="amount">
									<span class="amount-pay">-47.00</span>
								</div>
								<div class="balance">
									<span>余额：</span><em>0</em>
								</div>
							</li>
							<li class="cost">
								<div class="time">
									<p> 2016-01-30
									</p>
									<p class="text-muted"> 08:27
									</p>
								</div>
								<div class="title name">
									<p class="content">
										消费
									</p>
								</div>

								<div class="amount">
									<span class="amount-pay">-53.00</span>
								</div>
								<div class="balance">
									<span>余额：</span><em>47</em>
								</div>
							</li>
							<li>
								<div class="time">
									<p> 2016-01-28
									</p>
									<p class="text-muted"> 10:58
									</p>
								</div>
								<div class="title name">
									<p class="content">
										充值
									</p>
								</div>

								<div class="amount">
									<span class="amount-pay">+100.00</span>
								</div>
								<div class="balance">
									<span>余额：</span><em>100</em>
								</div>
							</li>
						</div>
						
						<!--分页-->
						<ul class="am-pagination am-pagination-right">
							<li class="am-disabled"><a href="#">&laquo;</a></li>
							<li class="am-active"><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li><a href="#">&raquo;</a></li>
						</ul>

					</div>

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
						<li> <a href="/index.php/Home/Person/information">个人信息</a></li>
						<li> <a href="/index.php/Home/Person/safety">安全设置</a></li>
						<li> <a href="/index.php/Home/Person/address">地址管理</a></li>
						<li> <a href="/index.php/Home/Person/cardlist">快捷支付</a></li>
					</ul>
				</li>
				<li class="person">
					<p><i class="am-icon-balance-scale"></i>我的交易</p>
					<ul>
						<li><a href="/index.php/Home/Person/order">订单管理</a></li>
						<li> <a href="/index.php/Home/Person/change">退款售后</a></li>
						<li> <a href="/index.php/Home/Person/comment">评价商品</a></li>
					</ul>
				</li>
				<li class="person">
					<p><i class="am-icon-dollar"></i>我的资产</p>
					<ul>
						<li> <a href="/index.php/Home/Person/points">我的积分</a></li>
						<li> <a href="/index.php/Home/Person/coupon">优惠券 </a></li>
						<li> <a href="/index.php/Home/Person/bonus">红包</a></li>
						<li> <a href="/index.php/Home/Person/walletlist">账户余额</a></li>
						<li> <a href="/index.php/Home/Person/bill">账单明细</a></li>
					</ul>
				</li>

				<li class="person">
					<p><i class="am-icon-tags"></i>我的收藏</p>
					<ul>
						<li> <a href="/index.php/Home/Person/collection">收藏</a></li>
						<li> <a href="/index.php/Home/Person/foot">足迹</a></li>														
					</ul>
				</li>

				<li class="person">
					<p><i class="am-icon-qq"></i>在线客服</p>
					<ul>
						<li> <a href="/index.php/Home/Person/consultation">商品咨询</a></li>
						<li> <a href="/index.php/Home/Person/suggest">意见反馈</a></li>							
						
						<li> <a href="/index.php/Home/Person/news">我的消息</a></li>
					</ul>
				</li>
			</ul>
		</aside>
	</body>

</html>
			<!-- 左边 -->
		</div>

	</body>

</html>