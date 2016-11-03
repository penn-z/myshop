<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>退换货</title>

		<link href="/Public/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/Public/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/Public/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/Public/css/refstyle.css" rel="stylesheet" type="text/css">

		<script src="/Public/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
		<script src="/Public/AmazeUI-2.4.2/assets/js/amazeui.js" type="text/javascript"></script>
		<script language="javascript" src="/Public/js/XHRUploader.class.js"></script>
		<script language="javascript" src="/Public/js/Ajax.class.js"></script>

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
					<!--标题 -->
					<div class="am-cf am-padding">
						<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">退换货申请</strong> / <small>Apply&nbsp;for&nbsp;returns</small></div>
					</div>
					<hr/>
					<div class="comment-list">
					<!--进度条-->
					<div class="m-progress">
						<div class="m-progress-list">
							<span class="step-1 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">1<em class="bg"></em></i>
                                <p class="stage-name">买家申请退款</p>
                            </span>
							<span class="step-2 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">2<em class="bg"></em></i>
                                <p class="stage-name">商家处理退款申请</p>
                            </span>
							<span class="step-3 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">3<em class="bg"></em></i>
                                <p class="stage-name">款项成功退回</p>
                            </span>                            
							<span class="u-progress-placeholder"></span>
						</div>
						<div class="u-progress-bar total-steps-2">
							<div class="u-progress-bar-inner"></div>
						</div>
					</div>
					
					
						<div class="refund-aside">
							<div class="item-pic">
								<a href="#" class="J_MakePoint">
									<img src="<?php echo ($detail["goods_thumb"]); ?>" class="itempic">
								</a>
							</div>

							<div class="item-title">

								<div class="item-name">
									<a href="#">
										<p class="item-basic-info"><?php echo ($detail["goods_name"]); ?></p>
									</a>
								</div>
								<div class="info-little">
									<span><?php echo ($detail["goods_type1"]); ?>：<?php echo ($detail["type1_name"]); ?></span>
									<span><?php echo ($detail["goods_type2"]); ?>：<?php echo ($detail["type2_name"]); ?></span>
								</div>
							</div>
							<div class="item-info">
								<div class="item-ordernumber">
									<span class="info-title">订单编号：</span><a><?php echo ($detail["order_id"]); ?></a>
								</div>
								<div class="item-price">
									<span class="info-title">价&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;格：</span><span class="price"><?php echo ($detail["goods_price"]); ?></span>
									<span class="number">×<?php echo ($detail["goods_num"]); ?></span><span class="item-title">(数量)</span>
								</div>
								<div class="item-amount">
									<span class="info-title">小&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;计：</span><span class="amount"><?php echo ($detail["goods_this_cost"]); ?>元</span>
								</div>
								<div class="item-pay-logis">
									<span class="info-title">运&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;费：</span><span class="price"><?php echo ($detail["express_fee"]); ?>元</span>
								</div>
								<div class="item-amountall">
									<span class="info-title">总&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;计：</span><span class="amountall"><?php echo ($detail["goods_this_total"]); ?>元</span>
								</div>
								<div class="item-time">
									<span class="info-title">成交时间：</span><span class="time"><?php echo (date("Y-m-d H:i:s",$detail["addtime"])); ?></span>
								</div>

							</div>
							<div class="clear"></div>
						</div>
						
						<div class="refund-main">
							<div class="item-comment">
								<div class="am-form-group">
									<label for="refund-type" class="am-form-label">退款类型</label>
									<div class="am-form-content">
									<?php if($_GET['status']== 1): ?><select data-am-selected="">
											<option value="仅退款" selected>仅退款</option>
										</select>
									<?php else: ?>
										<select data-am-selected="">
											<option value="仅退款" selected>仅退款</option>
											<option value="退款/退货">退款/退货</option>
										</select><?php endif; ?>
									</div>
								</div>
								
								<div class="am-form-group">
									<label for="refund-reason" class="am-form-label" >退款原因</label>
									<div class="am-form-content">
										<select data-am-selected="">
											<option value="未选择原因" selected>请选择退款原因</option>
											<option value="不想要了">不想要了</option>
											<option value="买错了">买错了</option>
											<option value="没收到货">没收到货</option>							
											<option value="与说明不符">与说明不符</option>
										</select>
									</div>
								</div>

								<div class="am-form-group">
									<label for="refund-money" class="am-form-label">退款金额<span>（不可修改）</span></label>
									<div class="am-form-content">
										<input type="text" id="refund-money" readonly="readonly" placeholder="<?php echo ($detail["goods_this_cost"]); ?>">
									</div>
								</div>
								<div class="am-form-group">
									<label for="refund-info" class="am-form-label">退款说明<span>（可不填）</span></label>
									<div class="am-form-content">
										<textarea placeholder="请输入退款说明"><?php echo ($refund_info["refund_info"]); ?></textarea>
									</div>
								</div>

							</div>
							<div class="refund-tip">
								<div class="filePic" style="float:left;width:auto;" >
									<input type="file" class="inputPic"  id="one" onclick="upload(this)" >
									<img src="/Public/images/image.jpg" style="display:block;width:80px;height:80px;float:left;">
									
								</div>
								<div class="filePic" style="float:left;width:auto">
									<input type="file" class="inputPic"  id="two" onclick="upload(this)">
									<img src="/Public/images/image.jpg" style="display:block;width:80px;height:80px;float:left;">
								</div>
								<div class="filePic" style="float:left;width:auto">
									<input type="file" class="inputPic"  id="three" onclick="upload(this)">
									<img src="/Public/images/image.jpg" style="display:block;width:80px;height:80px;float:left;">
								</div>
								<!-- <div class="img-box">
									<img src="/Public/images/image.jpg" >
								</div> -->
								<span class="desc" style="margin-top:50px;">上传凭证&nbsp;最多三张</span>
							</div>
							<div class="info-btn">
								<div class="am-btn am-btn-danger" style="float:right;" onclick="sub(this)">提交申请</div>
							</div>
						</div>
						<script>
							/**
							 * 进度条
							 */
							function programList(){
								var status = <?php echo ($_GET['goods_status']); ?>;
								switch(status){
									case 1:  	//待发货状态时进行退款
										$("input").attr("disabled",true);	//禁止上传图片
										$("#one").siblings("img").attr('src','<?php echo ((isset($refund_info["path"]["0"]) && ($refund_info["path"]["0"] !== ""))?($refund_info["path"]["0"]):"/Public/images/image.jpg"); ?>');
										$("#two").siblings("img").attr('src','<?php echo ((isset($refund_info["path"]["1"]) && ($refund_info["path"]["1"] !== ""))?($refund_info["path"]["1"]):"/Public/images/image.jpg"); ?>');
										$("#three").siblings("img").attr('src','<?php echo ((isset($refund_info["path"]["2"]) && ($refund_info["path"]["2"] !== ""))?($refund_info["path"]["2"]):"/Public/images/image.jpg"); ?>');
										$(".u-progress-bar-inner").css("width","49%");
										$(".info-btn").find(".am-btn").attr("disabled",true);	//商家退款中，退款申请按钮不能活动
										setTimeout(function(){
											$(".step-2 .u-stage-icon-inner .bg").animate({opacity:1});
										},1500);
										break;
									case 2:
										$("input").attr("disabled",true);	//禁止上传图片
										$("#one").siblings("img").attr('src','<?php echo ((isset($refund_info["path"]["0"]) && ($refund_info["path"]["0"] !== ""))?($refund_info["path"]["0"]):"/Public/images/image.jpg"); ?>');
										$("#two").siblings("img").attr('src','<?php echo ((isset($refund_info["path"]["1"]) && ($refund_info["path"]["1"] !== ""))?($refund_info["path"]["1"]):"/Public/images/image.jpg"); ?>');
										$("#three").siblings("img").attr('src','<?php echo ((isset($refund_info["path"]["2"]) && ($refund_info["path"]["2"] !== ""))?($refund_info["path"]["2"]):"/Public/images/image.jpg"); ?>');
										$(".u-progress-bar-inner").css("width","101%");
										$(".info-btn").find(".am-btn").attr("disabled",true);	//商家退款中，退款申请按钮不能活动
										setTimeout(function(){
											$(".step-2 .u-stage-icon-inner .bg").animate({opacity:1});
											setTimeout(function(){
												$(".step-3 .u-stage-icon-inner .bg").animate({opacity:1});
											},600);
										},950);
										break;
								}
							}
							document.onload = programList();	//页面加载完成后执行动作

							/**
							 * 异步上传退款凭证图片
							 */
							function upload(obj){
								var goods_sn = '<?php echo ($_GET['goods_sn']); ?>';
								var id = $(obj).attr("id");
					     		XHRUploader.init({
								handlerUrl: '/Api/Order/uploadPic',
								input: '_imgs[]'
								}).uploadFile(id, {
									'partition'	: 'date',
									'thumb'     : 2,
									'goods_sn'  : goods_sn,
									'order_id'	: '<?php echo ($_GET['order_id']); ?>',
									'type' 		: '退款凭证',
								},{
									ready: function(ret){
										// alert('zhengzai');
									},
									complete: function(ret){
										//alert('wangcheng');
										if( ret.status == true){
											// 此次上传前的图片数量
											$(obj).siblings("img").attr("src",ret.path);
											var html = '<a style="position:absolute;display:block;width:20px;z-index:200;cursor:pointer;" onclick="delPic(this)">X</a><input type="hidden" name="pic_path[]" value="'+ret.path+'"/>';
											$(obj).parent().append(html);
											$(obj).attr("disabled",true);	//使file不能活动
										}
									}
								});
							}

							/**
							 *	移除凭证图片
							 */
							function delPic(obj){
								var bool = window.confirm("确定要删除吗？");
								if(bool!=true) return;
								var src = $(obj).parent().find("img").attr("src");
								var full_path = "/var/www/shop"+src;
								$.get(	//异步删除已经上传的图片
									'/Api/Order/delCommentPic',
									{full_path:full_path},
									function(ret){
									}
								);
								$(obj).prev().prev().attr("disabled",false);	//使file重新活动
								$(obj).parent().find("img").attr("src","/Public/images/image.jpg");
								$(obj).remove();	//移除"x"符号
							}

							/**
							 * 提交申请
							 */
							function sub(obj){
								var bool = window.confirm("确定提交申请吗？");
								if( bool != true ) return;
								var father = $(obj).parents(".refund-main");	//父级div
								var refund_type = father.find(".am-form-group").eq(0).find("select").val();	//退款类型
								var refund_reason = father.find(".am-form-group").eq(1).find("select").val();//退款原因
								var refund_money = father.find(".am-form-group").eq(2).find("input").attr("placeholder");	//退款金额
								var refund_info = father.find(".am-form-group").eq(3).find("textarea").val();	//退款说明
								var path = [];	//定义数组存储图片地址
								father.find(".refund-tip").find("img").each(function(){
									var src = $(this).attr("src");
									if( src != "/Public/images/image.jpg" ){	//地址不为默认图片时
										path.push(src);
									}
								});
								var info = {};
								info.order_id = '<?php echo ($_GET['order_id']); ?>';
								info.goods_sn = '<?php echo ($_GET['goods_sn']); ?>';
								info.refund_type = refund_type;
								info.refund_reason = refund_reason;
								info.refund_money = refund_money;
								info.refund_info = refund_info;
								info.path = path;
								$.post(
									'/Api/Order/refund',
									{info:info},
									function(ret){
										if( ret == 'ok' ){
											alert("退款申请提交成功，请等待商家确认");
											window.location.href="/home/MyDeal/order.html";
										}
									}
								);
							}
						</script>
					</div>
					<div class="clear"></div>
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