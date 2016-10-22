<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>我的足迹</title>

		<link href="/Public/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/Public/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/Public/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/Public/css/footstyle.css" rel="stylesheet" type="text/css">

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

					<div class="user-foot">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">我的足迹</strong> / <small>Browser&nbsp;History</small></div>
						</div>
						<hr/>

						<!--足迹列表 -->

						<div class="goods">
							<div class="goods-date" data-date="2015-12-21">
								<span><i class="month-lite">12</i>.<i class="day-lite">21</i><i class="date-desc">今天</i></span>
								<del class="am-icon-trash"></del>
								<s class="line"></s>
							</div>

							<div class="goods-box first-box">
								<div class="goods-pic">
									<div class="goods-pic-box">
										<a class="goods-pic-link" target="_blank" href="#" title="意大利费列罗进口食品巧克力零食24粒  进口巧克力食品">
											<img src="/Public/images/TB1_pic.jpg_200x200.jpg" class="goods-img"></a>
									</div>
									<a class="goods-delete" href="javascript:void(0);"><i class="am-icon-trash"></i></a>
									<div class="goods-status goods-status-show"><span class="desc">宝贝已下架</span></div>
								</div>

								<div class="goods-attr">
									<div class="good-title">
										<a class="title" href="#" target="_blank">意大利费列罗进口食品巧克力零食24粒  进口巧克力食品</a>
									</div>
									<div class="goods-price">
										<span class="g_price">                                    
                                        <span>¥</span><strong>71</strong>
										</span>
										<span class="g_price g_price-original">                                    
                                        <span>¥</span><strong>142</strong>
										</span>
									</div>
									<div class="clear"></div>
									<div class="goods-num">
										<div class="match-recom">
											<a href="#" class="match-recom-item">找相似</a>
											<a href="#" class="match-recom-item">找搭配</a>
											<i><em></em><span></span></i>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="goods">
							<div class="goods-date" data-date="2015-12-21">
								<s class="line"></s>
							</div>

							<div class="goods-box">
								<div class="goods-pic">
									<div class="goods-pic-box">
										<a class="goods-pic-link" target="_blank" href="#" title="意大利费列罗进口食品巧克力零食24粒  进口巧克力食品">
											<img src="/Public/images/TB1_pic.jpg_200x200.jpg" class="goods-img"></a>
									</div>
									<a class="goods-delete" href="javascript:void(0);"><i class="am-icon-trash"></i></a>
									<div class="goods-status goods-status-show"><span class="desc">宝贝已下架</span></div>
								</div>

								<div class="goods-attr">
									<div class="good-title">
										<a class="title" href="#" target="_blank">意大利费列罗进口食品巧克力零食24粒  进口巧克力食品</a>
									</div>
									<div class="goods-price">
										<span class="g_price">                                    
                                        <span>¥</span><strong>71</strong>
										</span>
										<span class="g_price g_price-original">                                    
                                        <span>¥</span><strong>142</strong>
										</span>
									</div>
									<div class="clear"></div>
									<div class="goods-num">
										<div class="match-recom">
											<a href="#" class="match-recom-item">找相似</a>
											<a href="#" class="match-recom-item">找搭配</a>
											<i><em></em><span></span></i>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="goods">
							<div class="goods-date" data-date="2015-12-21">
								<s class="line"></s>
							</div>

							<div class="goods-box">
								<div class="goods-pic">
									<div class="goods-pic-box">
										<a class="goods-pic-link" target="_blank" href="#" title="意大利费列罗进口食品巧克力零食24粒  进口巧克力食品">
											<img src="/Public/images/TB1_pic.jpg_200x200.jpg" class="goods-img"></a>
									</div>
									<a class="goods-delete" href="javascript:void(0);"><i class="am-icon-trash"></i></a>
									<div class="goods-status goods-status-show"><span class="desc">宝贝已下架</span></div>
								</div>

								<div class="goods-attr">
									<div class="good-title">
										<a class="title" href="#" target="_blank">意大利费列罗进口食品巧克力零食24粒  进口巧克力食品</a>
									</div>
									<div class="goods-price">
										<span class="g_price">                                    
                                        <span>¥</span><strong>71</strong>
										</span>
										<span class="g_price g_price-original">                                    
                                        <span>¥</span><strong>142</strong>
										</span>
									</div>
									<div class="clear"></div>
									<div class="goods-num">
										<div class="match-recom">
											<a href="#" class="match-recom-item">找相似</a>
											<a href="#" class="match-recom-item">找搭配</a>
											<i><em></em><span></span></i>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="goods">
							<div class="goods-date" data-date="2015-12-21">
								<s class="line"></s>
							</div>

							<div class="goods-box">
								<div class="goods-pic">
									<div class="goods-pic-box">
										<a class="goods-pic-link" target="_blank" href="#" title="意大利费列罗进口食品巧克力零食24粒  进口巧克力食品">
											<img src="/Public/images/TB1_pic.jpg_200x200.jpg" class="goods-img"></a>
									</div>
									<a class="goods-delete" href="javascript:void(0);"><i class="am-icon-trash"></i></a>
									<div class="goods-status goods-status-show"><span class="desc">宝贝已下架</span></div>
								</div>

								<div class="goods-attr">
									<div class="good-title">
										<a class="title" href="#" target="_blank">意大利费列罗进口食品巧克力零食24粒  进口巧克力食品</a>
									</div>
									<div class="goods-price">
										<span class="g_price">                                    
                                        <span>¥</span><strong>71</strong>
										</span>
										<span class="g_price g_price-original">                                    
                                        <span>¥</span><strong>142</strong>
										</span>
									</div>
									<div class="clear"></div>
									<div class="goods-num">
										<div class="match-recom">
											<a href="#" class="match-recom-item">找相似</a>
											<a href="#" class="match-recom-item">找搭配</a>
											<i><em></em><span></span></i>
										</div>
									</div>
								</div>
							</div>
						</div>
						

						<div class="goods">
							<div class="goods-date" data-date="2015-12-21">
								<s class="line"></s>
							</div>

							<div class="goods-box">
								<div class="goods-pic">
									<div class="goods-pic-box">
										<a class="goods-pic-link" target="_blank" href="#" title="意大利费列罗进口食品巧克力零食24粒  进口巧克力食品">
											<img src="/Public/images/TB1_pic.jpg_200x200.jpg" class="goods-img"></a>
									</div>
									<a class="goods-delete" href="javascript:void(0);"><i class="am-icon-trash"></i></a>
									<div class="goods-status goods-status-show"><span class="desc">宝贝已下架</span></div>
								</div>

								<div class="goods-attr">
									<div class="good-title">
										<a class="title" href="#" target="_blank">意大利费列罗进口食品巧克力零食24粒  进口巧克力食品</a>
									</div>
									<div class="goods-price">
										<span class="g_price">                                    
                                        <span>¥</span><strong>71</strong>
										</span>
										<span class="g_price g_price-original">                                    
                                        <span>¥</span><strong>142</strong>
										</span>
									</div>
									<div class="clear"></div>
									<div class="goods-num">
										<div class="match-recom">
											<a href="#" class="match-recom-item">找相似</a>
											<a href="#" class="match-recom-item">找搭配</a>
											<i><em></em><span></span></i>
										</div>
									</div>
								</div>
							</div>
						</div>						
						<div class="clear"></div>
						<div class="goods">
							<div class="goods-date" data-date="2015-12-17">
								<span><i class="month-lite"></i><i class="day-lite"></i>	<i class="date-desc">一周内</i></span>
								<del class="am-icon-trash"></del>
								<s class="line"></s>
							</div>
							<div class="goods-box">
								<div class="goods-pic">
									<div class="goods-pic-box">
										<a class="goods-pic-link" target="_blank" href="#" title="意大利费列罗进口食品巧克力零食24粒  进口巧克力食品">
											<img src="/Public/images/TB1_pic.jpg_200x200.jpg" class="goods-img"></a>
									</div>
									<a class="goods-delete" href="javascript:void(0);"><i class="am-icon-trash"></i></a>
									<div class="goods-status goods-status-show"><span class="desc">宝贝已下架</span></div>
								</div>

								<div class="goods-attr">
									<div class="good-title">
										<a class="title" href="#" target="_blank">意大利费列罗进口食品巧克力零食24粒  进口巧克力食品</a>
									</div>
									<div class="goods-price">
										<span class="g_price">                                    
                                        <span>¥</span><strong>71</strong>
										</span>
										<span class="g_price g_price-original">                                    
                                        <span>¥</span><strong>142</strong>
										</span>
									</div>
									<div class="clear"></div>
									<div class="goods-num">
										<div class="match-recom">
											<a href="#" class="match-recom-item">找相似</a>
											<a href="#" class="match-recom-item">找搭配</a>
											<i><em></em><span></span></i>
										</div>
									</div>
								</div>
							</div>
						</div> 
						
						
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