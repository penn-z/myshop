<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>发表评论</title>

		<link href="/Public/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/Public/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/Public/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/Public/css/appstyle.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="/Public/js/jquery-1.7.2.min.js"></script>
		<script language="javascript" src="/Public/js/XHRUploader.class.js"></script>
		<script language="javascript" src="/Public/js/Ajax.class.js"></script>
	<style>
		.filePic img{display:block;}
	</style>
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
								<a name="key_word" href="/home/search.html"></a>
								<form action="/home/search.html" method="get">
									<input id="searchInput" name="key_word" type="text" placeholder="搜索" autocomplete="off">
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
								<li class="index"><a href="/home.html">首页</a></li>
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

					<div class="user-comment">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">发表评论</strong> / <small>Make&nbsp;Comments</small></div>
						</div>
						<hr/>

						<div class="comment-main">
						<?php if(is_array($detail)): foreach($detail as $key=>$vo): ?><!-- 商品评价 -->
							<div class="comment-list">
								<div class="item-pic">
									<a href="#" class="J_MakePoint">
										<img src="<?php echo ($vo["goods_thumb"]); ?>" class="itempic">
									</a>
								</div>

								<div class="item-title">

									<div class="item-name">
										<a href="#">
											<p class="item-basic-info"><?php echo ($vo["goods_name"]); ?></p>
										</a>
									</div>
									<div class="item-info">
										<div class="info-little">
											<input type="hidden" value="<?php echo ($vo["goods_sn"]); ?>" name="goods_sn" />
											<span><?php echo ($vo["goods_type1"]); ?>：<?php echo ($vo["goods_type"]); ?></span>
											<span><?php echo ($vo["goods_type2"]); ?>：<?php echo ($vo["goods_package"]); ?></span>
										</div>
										<div class="item-price">
											价格：<strong><?php echo ($vo["goods_price"]); ?>元</strong>
										</div>										
									</div>
								</div>
								<div class="clear"></div>
								<div class="item-comment">
									<textarea placeholder="请写下对宝贝的感受吧，对他人帮助很大哦！"></textarea>
								</div>
								<div class="filePic" style="width:100%;height:80px;">
									<div style="height:70px;width:80px;float:left;">
									<input type="file" class="inputPic" id="sn<?php echo ($vo["goods_sn"]); ?>" sn="<?php echo ($vo["goods_sn"]); ?>" onclick="upload('sn<?php echo ($vo["goods_sn"]); ?>',this)" style="display:inline-block;width:80px;height:40px;">
									<span style="cursor:pointer;color:green;">晒图片(<i class="picnum">0</i>/5)</span>
									</div>
									<!-- 此处放置添加后的晒图 -->
									<div style="width:auto;height:70px;float:left;" class="img-box">

									</div>
									
								</div>
								<div class="item-opinion">
									<li><i class="op1"></i>好评</li>
									<li><i class="op2"></i>中评</li>
									<li><i class="op3"></i>差评</li>
								</div>
							</div><?php endforeach; endif; ?>							
								<div class="info-btn">
									<div class="am-btn am-btn-danger" onclick="subComment()">发表评论</div>
								</div>							
					<script type="text/javascript">
						$(document).ready(function() {
							$(".comment-list .item-opinion li").click(function() {	
								$(this).prevAll().children('i').removeClass("active");
								$(this).nextAll().children('i').removeClass("active");
								$(this).children('i').addClass("active");
								
							});
				     	})
				     	
				     	/**
				     	 * 发表评论
				     	 */
				     	function subComment(){
				     		var num = $("input[name='goods_sn']").length;	//先取需要评论的商品个数
				     		//用for遍历长度，分别对每个评论内容进行数据库写入
				     		for(var i=0;i<num;i++){
				     			var obj = $("input[name='goods_sn']").eq(i);
				     			var goods_sn = obj.val();	//获取该条被评论的商品sn
				     			var comment_type = obj.parents(".comment-list").find(".item-opinion").find(".active").parent("li").text();	//获取评论的好坏
				     			var comment = obj.parents(".item-title").siblings(".item-comment").find("textarea").val();	//获取评论内容
				     			var path_array = [];	//创建数组存储每个图片地址
				     			obj.parents(".item-title").siblings(".filePic").find(".img-box").find("input[name='path']").each(function(){
				     				var path = $(this).val();
				     				path_array.push(path);
				     			});
				     			var information  = {};	//创建对象，放置每个商品的评价信息
				     			information.goods_sn = goods_sn;
				     			information.comment_type = comment_type;
				     			information.comment = comment;
				     			information.order_id = '<?php echo ($_GET['order_id']); ?>';
				     			information.picture = path_array;
				     			$.post(
				     				'/Api/Order/uploadComment',
				     				{information:information},
				     				function(ret){
				     					if( ret == 1){
				     						alert("评价成功！");
				     						window.location.href="/home/MyDeal/order.html";
				     					}
				     				}
				     			);
				     		}
				     	}

				     	/**
				     	 * 图片异步上传
				     	 */
				     	function upload(sn,obj){
				     		var goods_sn = $(obj).attr("sn");
				     		XHRUploader.init({
								handlerUrl: '/Api/Order/uploadPic',
								input: '_imgs[]'
							}).uploadFile(sn, {
								'partition'	: 'date',
								'thumb'     : 2,
								'goods_sn'  : goods_sn,
								'order_id'	: '<?php echo ($_GET['order_id']); ?>',
								'type' 		: '评价',
							},{
								ready: function(ret){
									// alert('zhengzai');
								},
								complete: function(ret){
									//alert('wangcheng');
									if( ret.status == true){
										//此次上传前的图片数量
										var num = $(obj).siblings("span").find('.picnum').text();
										if( num < 5){
											var html = '<div class="add" style="float:left;width:80px;height:70px;margin-left:10px;"><a style="position:absolute;display:block;width:20px;z-index:200;cursor:pointer;" onclick="delPic(this)">X</a><img src="'+ret.path+'" style="width:100%;height:100%;" /><input type="hidden" name="path" value="'+ret.path+'" /></div>';
											$(obj).parents(".filePic").find(".img-box").append(html);
											num++;	//已存在的图片数量自增
											$(obj).siblings("span").find(".picnum").text(num);
										}else{	//晒图数量大于5张时，删除多余添加的第6张
											var path = "/var/www/shop"+ret.path;
											$.get(
												'/Api/Order/delCommentPic',
												{full_path:path},
												function(ret){}
											);
										}
									}
								}
							});
				     	}

				     	/**
				     	 * 移除晒图的div
				     	 */
				     	function delPic(obj){
				     		var bool = window.confirm("确定要删除吗？");
				     		if( bool != true) return;
				     		var pic_num = $(obj).parents(".filePic").find(".picnum").text();
				     		var path = $(obj).siblings("input").val();
				     		var full_path = "/var/www/shop"+path;	//拼接成完全路径名
				     		$.get(
				     			'/Api/Order/delCommentPic',
				     			{full_path:full_path},
				     			function(ret){}
				     		);
				     		pic_num--;
				     		$(obj).parents(".filePic").find(".picnum").text(pic_num);
				     		$(obj).parent().remove();
				     	}
					     	
					</script>					
					
												
							
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
						<li><a href="/home/MyDeal/order.html">订单管理</a></li>
						<li> <a href="/home/MyDeal/change.html">退款售后</a></li>
						<li> <a href="/home/MyDeal/comment.html">评价商品</a></li>
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