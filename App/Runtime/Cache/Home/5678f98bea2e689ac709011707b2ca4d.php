<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>订单管理</title>

		<link href="/Public/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/Public/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/Public/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/Public/css/orstyle.css" rel="stylesheet" type="text/css">

		<script src="/Public/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
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

		
	</body>

</html>
		<!-- 头 -->
		<div class="center">
			<div class="col-main">
				<div class="main-wrap">

					<div class="user-order">

						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">订单管理</strong> / <small>Order</small></div>
						</div>
						<hr/>

						<div class="am-tabs am-tabs-d2 am-margin" data-am-tabs>

							<ul class="am-avg-sm-5 am-tabs-nav am-nav am-nav-tabs">
								<li class="am-active"><a href="#tab1">所有订单</a></li>
								<li><a href="#tab2">待付款</a></li>
								<li><a href="#tab3">待发货</a></li>
								<li><a href="#tab4">待收货</a></li>
								<li><a href="#tab5">待评价</a></li>
							</ul>

							<div class="am-tabs-bd">
								<div class="am-tab-panel am-fade am-in am-active" id="tab1">
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
										<div class="order-list">
											
											<!--交易成功-->
											<div class="order-status5">
											<?php if(is_array($evaluated_details)): foreach($evaluated_details as $index=>$evaluated_detail): ?><div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;"><?php echo ($Evaluated["$index"]["order_id"]); ?></a></div>
													<span>成交时间：<?php echo (date("Y-m-d H:i:s",$Evaluated["$index"]["addtime"])); ?></span>
													<!--    <em>店铺：小桔灯</em>-->
												</div>
												<div class="order-content">
													<div class="order-left">
													<?php if(is_array($evaluated_detail)): foreach($evaluated_detail as $key=>$vo): ?><ul class="item-list">
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
																	
																</div>
															</li>
														</ul><?php endforeach; endif; ?>
													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：<?php echo ($Evaluated["$index"]["total_money"]); ?>
																<p>含运费：<span><?php echo ($Evaluated["$index"]["express_fee"]); ?></span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">交易成功</p>
																	<p class="order-info"><a href="orderinfo.html">订单详情</a></p>
																	<p class="order-info"><a href="logistics.html">查看物流</a></p>
																</div>
															</li>
															<li class="td td-change">
																<div class="am-btn am-btn-danger anniu">
																	删除订单</div>
															</li>
														</div>
													</div>
												</div><?php endforeach; endif; ?>
											</div>
											
											
											<!--交易失败-->
											<div class="order-status0">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;">1601430</a></div>
													<span>成交时间：2015-12-20</span>
													<!--    <em>店铺：小桔灯</em>-->
												</div>
												<div class="order-content">
													<div class="order-left">
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="/Public/images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p>美康粉黛醉美唇膏 持久保湿滋润防水不掉色</p>
																			<p class="info-little">颜色：12#川南玛瑙
																				<br/>包装：裸装 </p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	333.00
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>2
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	
																</div>
															</li>
														</ul>

														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="/Public/images/62988.jpg_80x80.jpg" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p>礼盒袜子女秋冬 纯棉袜加厚 韩国可爱 </p>
																			<p class="info-little">颜色分类：李清照
																				<br/>尺码：均码</p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	333.00
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>2
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	
																</div>
															</li>
														</ul>

														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="/Public/images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p>美康粉黛醉美唇膏 持久保湿滋润防水不掉色</p>
																			<p class="info-little">颜色：12#川南玛瑙
																				<br/>包装：裸装 </p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	333.00
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>2
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	
																</div>
															</li>
														</ul>
													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：676.00
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">交易关闭</p>
																</div>
															</li>
															<li class="td td-change">
																<div class="am-btn am-btn-danger anniu">
																	删除订单</div>
															</li>
														</div>
													</div>
												</div>
											</div>											
											
											<!--待发货-->
											<div class="order-status2">
											<?php if(is_array($details)): foreach($details as $index=>$detail): ?><div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;"><?php echo ($Nosent["$index"]["order_id"]); ?></a></div>
													<span>成交时间：<?php echo (date("Y-m-d H:i:s",$Nosent["$index"]["addtime"])); ?></span>
													<!--    <em>店铺：小桔灯</em>-->
												</div>
												<div class="order-content">
													<div class="order-left">
													<?php if(is_array($detail)): foreach($detail as $key=>$vo): ?><ul class="item-list">
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
																	<a href="refund.html">退款</a>
																</div>
															</li>
														</ul><?php endforeach; endif; ?>
														
													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：<?php echo ($Nosent["$index"]["total_money"]); ?>
																<p>含运费：<span><?php echo ($Nosent["$index"]["express_fee"]); ?></span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">买家已付款</p>
																	<p class="order-info"><a href="orderinfo.html">订单详情</a></p>
																</div>
															</li>
															<li class="td td-change">
																<div class="am-btn am-btn-danger anniu">
																	提醒发货</div>
															</li>
														</div>
													</div>
												</div><?php endforeach; endif; ?>
											</div>


											<!--待收货-->
											<div class="order-status3">
											<?php if(is_array($senting_details)): foreach($senting_details as $index=>$senting_detail): ?><div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;"><?php echo ($Senting["$index"]["order_id"]); ?></a></div>
													<span>成交时间：<?php echo (date("Y-m-d H:i:s",$Senting["$index"]["addtime"])); ?></span>
													<!--    <em>店铺：小桔灯</em>-->
												</div>
												<div class="order-content">
													<div class="order-left">
													<?php if(is_array($senting_detail)): foreach($senting_detail as $key=>$vo): ?><ul class="item-list">
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
																	<a href="refund.html">退款/退货</a>
																</div>
															</li>
														</ul><?php endforeach; endif; ?>
													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：<?php echo ($Senting["$index"]["total_money"]); ?>
																<p>含运费：<span><?php echo ($Senting["$index"]["express_fee"]); ?></span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">卖家已发货</p>
																	<p class="order-info"><a href="orderinfo.html">订单详情</a></p>
																	<p class="order-info"><a href="logistics.html">查看物流</a></p>
																	<p class="order-info"><a href="#">延长收货</a></p>
																</div>
															</li>
															<li class="td td-change">
																<div class="am-btn am-btn-danger anniu">
																	确认收货</div>
															</li>
														</div>
													</div>
												</div><?php endforeach; endif; ?>
											</div>

										</div>

									</div>

								</div>
								<div class="am-tab-panel am-fade" id="tab2">

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

									<?php if(is_array($nopay_details)): foreach($nopay_details as $index=>$nopay_detail): ?><div class="order-main">
										<div class="order-list">
											<div class="order-status1">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;"><?php echo ($Nopay["$index"]["order_id"]); ?></a></div>
													<span>成交时间：<?php echo (date("Y-m-d H:i:s",$Nopay["$index"]["addtime"])); ?></span>
													<!--    <em>店铺：小桔灯</em>-->
												</div>
												<div class="order-content">
													<div class="order-left">
													<?php if(is_array($nopay_detail)): foreach($nopay_detail as $key=>$vo): ?><ul class="item-list">
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

																</div>
															</li>
														</ul><?php endforeach; endif; ?>
														
													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：<?php echo ($Nopay["$index"]["total_money"]); ?>
																<p>含运费：<span><?php echo ($Nopay["$index"]["express_fee"]); ?></span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">等待买家付款</p>
																	<p class="order-info"><a order="<?php echo ($Nopay["$index"]["order_id"]); ?>" style="text-decoration:none;color:#000;cursor:pointer;" onclick="cancelOrder(this)">取消订单</a></p>

																</div>
															</li>
															<li class="td td-change">
																<a href="/home/pay/payment.html?order_id=<?php echo ($Nopay["$index"]["order_id"]); ?>">
																<div class="am-btn am-btn-danger anniu">
																	一键支付</div></a>
															</li>
														</div>
													</div>

												</div>
											</div>
										</div>
									</div><?php endforeach; endif; ?>
								</div>
								<script>
									function cancelOrder(obj){
										var bool = window.confirm("确定要取消订单吗？");
										if(bool!=true) return;
										var order_id = $(obj).attr("order");
										$.get(
											'/Api/Order/cancelOrder',
											{order_id:order_id},
											function(ret){
												alert("订单已取消");
												window.location.href="/home/MyDeal/order";
											}
										);
									}
								</script>
								<div class="am-tab-panel am-fade" id="tab3">
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
									
									<?php if(is_array($details)): foreach($details as $key=>$detail): ?><div class="order-main">
										<div class="order-list">
											<div class="order-status2">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;"><?php echo ($Nosent["$key"]["order_id"]); ?></a></div>
													<span>成交时间：<?php echo (date("Y-m-d h:i:s",$Nosent["$key"]["addtime"])); ?></span>
													<!--    <em>店铺：小桔灯</em>-->
												</div>
												<div class="order-content">
													<div class="order-left">
													<?php if(is_array($detail)): foreach($detail as $innerKey=>$vo): ?><ul class="item-list">
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
																				<br/><?php echo ($vo["goods_type2"]); ?>：<?php echo ($vo["goods_package"]); ?></p>
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
																	<a href="refund.html">退款</a>
																</div>
															</li>
														</ul><?php endforeach; endif; ?>
														
													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：<?php echo ($Nosent["$key"]["total_money"]); ?>
																<p>含运费：<span><?php echo ($Nosent["$key"]["express_fee"]); ?></span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">买家已付款</p>
																	<p class="order-info"><a href="/home/MyDeal/orderinfo.html?order_id=<?php echo ($Nosent["$key"]["order_id"]); ?>&status=<?php echo ($Nosent["$key"]["status"]); ?>">订单详情</a></p>
																</div>
															</li>
															<li class="td td-change">
																<div class="am-btn am-btn-danger anniu">
																	提醒发货</div>
															</li>
														</div>
													</div>
												</div>
												
											</div>
										</div>
									</div><?php endforeach; endif; ?>
								</div>
								<div class="am-tab-panel am-fade" id="tab4">
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
									
									<?php if(is_array($senting_details)): foreach($senting_details as $key=>$senting_detail): ?><div class="order-main">
										<div class="order-list">
											<div class="order-status3">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;"><?php echo ($Senting["$key"]["order_id"]); ?></a></div>
													<span>成交时间：<?php echo (date("Y-m-d H:i:s",$Senting["$key"]["addtime"])); ?></span>
													<!--    <em>店铺：小桔灯</em>-->
												</div>
												<div class="order-content">
													<div class="order-left">
														<?php if(is_array($senting_detail)): foreach($senting_detail as $inKey=>$vo): ?><ul class="item-list">
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
																	<a href="refund.html">退款/退货</a>
																</div>
															</li>
														</ul><?php endforeach; endif; ?>
													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：<?php echo ($Senting["$key"]["total_money"]); ?>
																<p>含运费：<span><?php echo ($Senting["$key"]["express_fee"]); ?></span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">卖家已发货</p>
																	<p class="order-info"><a href="orderinfo.html">订单详情</a></p>
																	<p class="order-info"><a href="logistics.html">查看物流</a></p>
																	<p class="order-info"><a href="#">延长收货</a></p>
																</div>
															</li>
															<li class="td td-change">
																<div class="am-btn am-btn-danger anniu">
																	确认收货</div>
															</li>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div><?php endforeach; endif; ?>
								</div>

								<div class="am-tab-panel am-fade" id="tab5">
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
									
									<?php if(is_array($evaluate_details)): foreach($evaluate_details as $key=>$evaluate_detail): ?><div class="order-main">
										<div class="order-list">
											<!--不同状态的订单	-->
										<div class="order-status4">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;"><?php echo ($Evaluate["$key"]["order_id"]); ?></a></div>
													<span>成交时间：<?php echo (date("Y-m-d H:i:s",$Evaluate["$key"]["addtime"])); ?></span>

												</div>
												<div class="order-content">
													<div class="order-left">
														<?php if(is_array($evaluate_detail)): foreach($evaluate_detail as $inKey=>$vo): ?><ul class="item-list">
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
																	<a href="refund.html">退款/退货</a>
																</div>
															</li>
														</ul><?php endforeach; endif; ?>
													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：<?php echo ($Evaluate["$key"]["total_money"]); ?>
																<p>含运费：<span><?php echo ($Evaluate["$key"]["express_fee"]); ?></span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">交易成功</p>
																	<p class="order-info"><a href="orderinfo.html">订单详情</a></p>
																	<p class="order-info"><a href="logistics.html">查看物流</a></p>
																</div>
															</li>
															<li class="td td-change">
																<a href="commentlist.html">
																	<div class="am-btn am-btn-danger anniu">
																		评价商品</div>
																</a>
															</li>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div><?php endforeach; endif; ?>
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
	</body>

</html>
			<!-- 左边 -->
		</div>

	</body>

</html>