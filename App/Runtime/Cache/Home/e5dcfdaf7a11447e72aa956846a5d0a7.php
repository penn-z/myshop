<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>订单详情</title>

		<link href="/Public/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/Public/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/Public/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/Public/css/orstyle.css" rel="stylesheet" type="text/css">

		<script src="/Public/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/Public/AmazeUI-2.4.2/assets/js/amazeui.js"></script>


	</head>

	<body>
		<!--头 -->
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
								<div class="menu-hd"><a id="mc-menu-hd" href="/home/pay/shopcart" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h" style="color:orange;">0</strong></a></div>
							</div>
							<div class="topMessage favorite">
								<div class="menu-hd"><a href="/index.php/Home/MyDeal/collection" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
						</ul>
						</div>
						<script>
							$(function(){
								$.post(
									'/Api/Goods/differentCart',
									null,
									function(ret){
										$("#J_MiniCartNum").text(ret);
									}
								);
								
							});
						</script>

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

		<!-- 头 -->
		<div class="center">
			<div class="col-main">
				<div class="main-wrap">

					<div class="user-orderinfo">

						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">订单详情</strong> / <small>Order&nbsp;details</small></div>
						</div>
						<hr/>
						<!--进度条-->
						<div class="m-progress">
							<div class="m-progress-list">
								<span class="step-1 step">
                                   <em class="u-progress-stage-bg"></em>
                                   <i class="u-stage-icon-inner">1<em class="bg"></em></i>
                                   <p class="stage-name">拍下商品</p>
                                </span>
                                <span class="step-2 step">
                                   <em class="u-progress-stage-bg"></em>
                                   <i class="u-stage-icon-inner">2<em class="bg"></em></i>
                                   <p class="stage-name">付款</p>
                                </span>
								<span class="step-3 step">
                                   <em class="u-progress-stage-bg"></em>
                                   <i class="u-stage-icon-inner">3<em class="bg"></em></i>
                                   <p class="stage-name">卖家发货</p>
                                </span>
								<span class="step-4 step">
                                   <em class="u-progress-stage-bg"></em>
                                   <i class="u-stage-icon-inner">4<em class="bg"></em></i>
                                   <p class="stage-name">确认收货</p>
                                </span>
								<span class="step-5 step">
                                   <em class="u-progress-stage-bg"></em>
                                   <i class="u-stage-icon-inner">5<em class="bg"></em></i>
                                   <p class="stage-name">交易完成</p>
                                </span>
								<span class="u-progress-placeholder"></span>
							</div>
							<div class="u-progress-bar total-steps-2">
								<div class="u-progress-bar-inner"></div>
							</div>
						</div>
						<script>
							/**
							 * 进度条变化情况
							 */
							function programList(){
								var status = <?php echo ($_GET['status']); ?>;
								switch( status ){
									case 1:  	//待发货状态
										$(".u-progress-bar-inner").css("width","23%");
										setTimeout(function(){
											$(".step-2 .u-stage-icon-inner .bg").animate({opacity:1});
										},1500);
										break;
									case 2:
										$(".u-progress-bar-inner").css("width","49%");
										setTimeout(function(){
											setTimeout(function(){
												$(".step-3 .u-stage-icon-inner .bg").animate({opacity:1});
											},500);
											$(".step-2 .u-stage-icon-inner .bg").animate({opacity:1});
										},850);
										break;
									case 3:
										$(".u-progress-bar-inner").css("width","75%");
										setTimeout(function(){
											setTimeout(function(){
												setTimeout(function(){
													$(".step-4 .u-stage-icon-inner .bg").animate({opacity:1});
												},250)
												$(".step-3 .u-stage-icon-inner .bg").animate({opacity:1});
											},500);
											$(".step-2 .u-stage-icon-inner .bg").animate({opacity:1});
										},650);
										break;
									case 4:
										$(".u-progress-bar-inner").css("width","101%");
										setTimeout(function(){
											setTimeout(function(){
												setTimeout(function(){
													setTimeout(function(){
														$(".step-5 .u-stage-icon-inner .bg").animate({opacity:1});
													},100)
													$(".step-4 .u-stage-icon-inner .bg").animate({opacity:1});
												},250)
												$(".step-3 .u-stage-icon-inner .bg").animate({opacity:1});
											},400);
											$(".step-2 .u-stage-icon-inner .bg").animate({opacity:1});
										},650);
										break;
								}
							}
							document.onload = programList();
						</script>
						<div class="order-infoaside">
							<div class="order-logistics">
								<a href="logistics.html">
									<div class="icon-log">
										<i><img src="/Public/images/receive.png"></i>
									</div>
									<div class="latest-logistics">
										<p class="text">已签收,签收人是青年城签收，感谢使用天天快递，期待再次为您服务</p>
										<div class="time-list">
											<span class="date">2015-12-19</span><span class="week">周六</span><span class="time">15:35:42</span>
										</div>
										<div class="inquire">
											<span class="package-detail">物流：天天快递</span>
											<span class="package-detail">快递单号: </span>
											<span class="package-number">373269427868</span>
											<a href="logistics.html">查看</a>
										</div>
									</div>
									<span class="am-icon-angle-right icon"></span>
								</a>
								<div class="clear"></div>
							</div>
							<div class="order-addresslist">
								<div class="order-address">
									<div class="icon-add">
									</div>
									<p class="new-tit new-p-re">
										<span class="new-txt"><?php echo ($common["receiver"]); ?></span>
										<span class="new-txt-rd2"><?php echo ($common["phone"]); ?></span>
									</p>
									<div class="new-mu_l2a new-p-re">
										<p class="new-mu_l2cw">
											<span class="title">收货地址：</span>
											<span class="province"><?php echo ($common["province"]); ?></span>
											<span class="city"><?php echo ($common["city"]); ?></span>
											<span class="dist"><?php echo ($common["district"]); ?></span>
											<span class="street"><?php echo ($common["street"]); ?></span></p>
									</div>
								</div>
							</div>
						</div>
						<div class="order-infomain">

							<div class="order-top">
								<div class="th th-item">
									<td class="td-inner">商品</td>
								</div>
								<div class="th th-price">
									<td class="td-inner">单价</td>
								</div>
								<div class="th th-number">
									<td class="td-inner">数量</td>
								</div>
								<div class="th th-operation">
									<td class="td-inner">商品操作</td>
								</div>
								<div class="th th-amount">
									<td class="td-inner">合计</td>
								</div>
								<div class="th th-status">
									<td class="td-inner">交易状态</td>
								</div>
								<div class="th th-change">
									<td class="td-inner">交易操作</td>
								</div>
							</div>

							<div class="order-main">

								<div class="order-status3">
									<div class="order-title">
										<div class="dd-num">订单编号：<a href="javascript:;"><?php echo ($common["order_id"]); ?></a></div>
										<span>成交时间：<?php echo (date("Y-m-d H:i:s",$common["addtime"])); ?></span>
										<!--    <em>店铺：小桔灯</em>-->
									</div>
									
									<div class="order-content">
										<div class="order-left">
											<?php if(is_array($order_detail)): foreach($order_detail as $key=>$vo): ?><ul class="item-list">
												<li class="td td-item">
													<div class="item-pic">
														<a href="#" class="J_MakePoint">
															<img src="<?php echo ($vo["goods_thumb"]); ?>" class="itempic J_ItemImg">
														</a>
													</div>
													<div class="item-info">
														<div class="item-basic-info">
															<a href="#">
																<p><?php echo ($vo["goods_name"]); ?></p>
																<p class="info-little"><?php echo ($vo["goods_type1"]); ?>：<?php echo ($vo["goods_type"]); ?>
																	<br/><?php echo ($vo["goods_type2"]); ?>：<?php echo ($vo["goods_package"]); ?> </p>
															</a>
														</div>
													</div>
												</li>
												<li class="td td-price">
													<div class="item-price">
														<?php echo ($vo["goods_price"]); ?>
													</div>
												</li>
												<li class="td td-number">
													<div class="item-number">
														<span>×</span><?php echo ($vo["goods_num"]); ?>
													</div>
												</li>
												<li class="td td-operation">
													<div class="item-operation">
														退款/退货
													</div>
												</li>
											</ul><?php endforeach; endif; ?>
										</div>
										<div class="order-right">
											<li class="td td-amount">
												<div class="item-amount">
													合计：<?php echo ($common["total_money"]); ?>
													<p>含运费：<span><?php echo ($common["express_fee"]); ?></span></p>
												</div>
											</li>
											<div class="move-right">
											<!-- status=2 为待收货状态 -->
											<?php if($common["status"] == 2): ?><li class="td td-status">
													<div class="item-status">
														<p class="Mystatus">卖家已发货</p>
														<p class="order-info"><a href="/home/MyDeal/refund.html">退货/退款</a></p>
														<p class="order-info"><a href="/home/MyDeal/logistics.html">查看物流</a></p>
														<p class="order-info"><a href="#">延长收货</a></p>
													</div>
												</li>
												<li class="td td-change">
													<div class="am-btn am-btn-danger anniu">
														确认收货</div>
												</li>
											<!-- status=1 为待发货状态 -->
											<?php elseif($common["status"] == 1): ?>
												<li class="td td-status">
													<div class="item-status">
														<p class="Mystatus">买家已付款</p>
														<p class="order-info"><a href="/home/MyDeal/orderinfo.html?order_id=<?php echo ($Nosent["$key"]["order_id"]); ?>&status=<?php echo ($Nosent["$key"]["status"]); ?>">取消订单</a></p>
													</div>
												</li>
												<li class="td td-change">
													<div class="am-btn am-btn-danger anniu">
														提醒发货</div>
												</li>
											<!-- status=3 为已收到货待评价状态 -->	
											<?php elseif($common["status"] == 3): ?>
												<li class="td td-status">
													<div class="item-status">
														<p class="Mystatus">交易成功</p>
														<p class="order-info"><a href="/home/MyDeal/logistics.html">查看物流</a></p>
													</div>
												</li>
												<li class="td td-change">
													<a href="/home/MyDeal/commentlist.html?order_id=<?php echo ($common["order_id"]); ?>">
														<div class="am-btn am-btn-danger anniu">
															评价商品</div>
													</a>
												</li>
											<!-- status=4 为已评价状态 -->
											<?php elseif($common["status"] == 4): ?>
												<li class="td td-status">
													<div class="item-status">
														<p class="Mystatus">交易成功</p>
														<p class="order-info"><a href="/home/MyDeal/logistics.html">查看物流</a></p>
													</div>
												</li>
												<li class="td td-change">
													<div class="am-btn am-btn-success anniu">
														删除订单</div>
												</li><?php endif; ?>
											</div>
										</div>
									</div>
									
								</div>
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

			</div>
			<!-- 左边 -->
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
						<li><a href="/home/MyDeal/order">订单管理</a></li>
						<li> <a href="/index.php/Home/MyDeal/change">退款售后</a></li>
						<li> <a href="/index.php/Home/MyDeal/comment">评价商品</a></li>
					</ul>
				</li>
				<li class="person">
					<p><i class="am-icon-dollar"></i>我的资产</p>
					<ul>
						<li> <a href="/index.php/Home/MyDeal/points">我的积分</a></li>
						<li> <a href="/index.php/Home/MyDeal/coupon">优惠券 </a></li>
						<li> <a href="/index.php/Home/MyDeal/bonus">红包</a></li>
						<li> <a href="/index.php/Home/MyDeal/walletlist">账户余额</a></li>
						<li> <a href="/index.php/Home/MyDeal/bill">账单明细</a></li>
					</ul>
				</li>

				<li class="person">
					<p><i class="am-icon-tags"></i>我的收藏</p>
					<ul>
						<li> <a href="/index.php/Home/MyDeal/collection">收藏</a></li>
						<li> <a href="/index.php/Home/MyDeal/foot">足迹</a></li>														
					</ul>
				</li>

				<li class="person">
					<p><i class="am-icon-qq"></i>在线客服</p>
					<ul>
						<li> <a href="/index.php/Home/MyDeal/consultation">商品咨询</a></li>
						<li> <a href="/index.php/Home/MyDeal/suggest">意见反馈</a></li>							
						
						<li> <a href="/index.php/Home/MyDeal/news">我的消息</a></li>
					</ul>
				</li>
			</ul>
		</aside>

			<!-- 左边 -->
		</div>

	</body>

</html>