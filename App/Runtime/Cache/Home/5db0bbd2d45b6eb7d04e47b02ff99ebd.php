<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>地址管理</title>

		<link href="/Public/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/Public/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/Public/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/Public/css/addstyle.css" rel="stylesheet" type="text/css">
		<script src="/Public/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
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
								<div class="menu-hd"><a href="/index.php/Home/Information/collection" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
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

					<div class="user-address">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">地址管理</strong> / <small>Address&nbsp;list</small></div>
						</div>
						<hr/>
						<ul class="am-avg-sm-1 am-avg-md-3 am-thumbnails">
						<?php if(is_array($data)): foreach($data as $key=>$vo): if(($vo["is_default"]) == "1"): ?><li class="user-addresslist defaultAddr">
									<span class="new-option-r" onclick="setDefault('<?php echo ($vo["id"]); ?>')"><i class="am-icon-check-circle"></i>默认地址</span>
									<p class="new-tit new-p-re">
										<span class="new-txt"><?php echo ($vo["receiver"]); ?></span>
										<span class="new-txt-rd2"><?php echo ($vo["rece_phone"]); ?></span>
									</p>
									<div class="new-mu_l2a new-p-re">
										<p class="new-mu_l2cw">
											<span class="title">地址：</span>
											<span class="province"><?php echo ($vo["province"]); ?></span>
											<span class="city"><?php echo ($vo["city"]); ?></span>
											<span class="dist"><?php echo ($vo["district"]); ?></span>
											<span class="street"><?php echo ($vo["post_address"]); ?></span></p>
									</div>
									<div class="new-addr-btn">
										<a href="/home/information/editAddress?id=<?php echo ($vo["id"]); ?>"><i class="am-icon-edit"></i>编辑</a>
										<span class="new-addr-bar">|</span>
										<a href="/home/information/address?iact=del&id=<?php echo ($vo["id"]); ?>" onclick="return window.confirm('确定要删除此地址吗?');"><i class="am-icon-trash" ></i>删除</a>
									</div>
								</li>
							<?php else: ?>
								<li class="user-addresslist">
								<span class="new-option-r" onclick="setDefault('<?php echo ($vo["id"]); ?>')"><i class="am-icon-check-circle"></i>设为默认</span>
								<p class="new-tit new-p-re">
									<span class="new-txt"><?php echo ($vo["receiver"]); ?></span>
									<span class="new-txt-rd2"><?php echo ($vo["rece_phone"]); ?></span>
								</p>
								<div class="new-mu_l2a new-p-re">
									<p class="new-mu_l2cw">
										<span class="title">地址：</span>
										<span class="province"><?php echo ($vo["province"]); ?></span>
										<span class="city"><?php echo ($vo["city"]); ?></span>
										<span class="dist"><?php echo ($vo["district"]); ?></span>
										<span class="street"><?php echo ($vo["post_address"]); ?></span></p>
								</div>
								<div class="new-addr-btn">
									<a href="/home/information/editAddress?id=<?php echo ($vo["id"]); ?>"><i class="am-icon-edit"></i>编辑</a>
									<span class="new-addr-bar">|</span>
									<a href="/home/information/address?iact=del&id=<?php echo ($vo["id"]); ?>" onclick="return window.confirm('确定要删除此地址吗?');" >删除</a>
								</div>
							</li><?php endif; endforeach; endif; ?>
						</ul>

						<div class="clear"></div>
						<a class="new-abtn-type" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0}">添加新地址</a>
						<!--例子-->
						<div class="am-modal am-modal-no-btn" id="doc-modal-1">

							<div class="add-dress">

								<!--标题 -->
								<div class="am-cf am-padding">
									<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">新增地址</strong> / <small>Add&nbsp;address</small></div>
								</div>
								<hr/>

								<div class="am-u-md-12 am-u-lg-8" style="margin-top: 20px;">
									<form class="am-form am-form-horizontal" id="add" action="/home/information/address" method="post">

										<div class="am-form-group">
											<label for="user-name" class="am-form-label">收货人</label>
											<div class="am-form-content">
												<input type="text" id="user-name" name="receive[receiver]" placeholder="收货人" value="<?php echo ($single["receiver"]); ?>">
											</div>
										</div>

										<div class="am-form-group">
											<label for="user-phone" class="am-form-label">手机号码</label>
											<div class="am-form-content">
												<input id="user-phone" name="receive[rece_phone]" placeholder="手机号必填" value="<?php echo ($single["rece_phone"]); ?>">
											</div>
										</div>
										<div class="am-form-group">
											<label for="user-address" class="am-form-label">所在地</label>
											<div class="am-form-content address">
												
  <div data-toggle="distpicker">
    <div class="form-group">
      <!-- <label class="sr-only" for="province">Province</label> -->
      <select class="form-control" id="province" name="receive[province]" data-province="<?php echo ($single["province"]); ?>"></select>
    </div>
    <div class="form-group">
      <!-- <label class="sr-only" for="city">City</label> -->
      <select class="form-control" id="city" name="receive[city]" data-city="<?php echo ($single["city"]); ?>"></select>
    </div>
    <div class="form-group">
      <!-- <label class="sr-only" for="district">District</label> -->
      <select class="form-control" id="district" name="receive[district]" data-district="<?php echo ($single["district"]); ?>"></select>
    </div>
  </div>

<script src="/Public/js/jquery-1.7.2.min.js"></script>
<script src="/Public/js/address/distpicker.data.js"></script>
<script src="/Public/js/address/distpicker.js"></script>

											</div>

										</div>
										
										<div class="am-form-group">
											<label for="user-intro" class="am-form-label">详细地址</label>
											<div class="am-form-content">
												<textarea class="" rows="3" id="user-intro" name="receive[post_address]" placeholder="输入详细地址"  maxlength="100" ><?php echo ($single["post_address"]); ?></textarea>
												<small>100字以内写出你的详细地址...</small>
											</div>
										</div>

										<div class="am-form-group">
											<div class="am-u-sm-9 am-u-sm-push-3">
												<a class="am-btn am-btn-danger" onclick="sub()">保存</a>
												<!-- <a href="javascript: void(0);" class="am-close am-btn am-btn-danger" data-am-modal-close>取消</a> -->
												<input type="reset" class="am-close am-btn am-btn-danger" value="取消"/>
											</div>
										</div>
										<input type="hidden" name="act" value='add' />
									</form>
								</div>

							</div>

						</div>

					</div>

					<script type="text/javascript">
						$(document).ready(function() {							
							$(".new-option-r").click(function() {
								$(this).parent('.user-addresslist').addClass("defaultAddr").siblings().removeClass("defaultAddr");
								$(".new-option-r").text('设为默认');
								$(this).text('默认地址');
							});
							
							var $ww = $(window).width();
							if($ww>640) {
								$("#doc-modal-1").removeClass("am-modal am-modal-no-btn")
							}
							
						})
					</script>

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

			<!-- 左边 -->
		</div>
<script>
function sub(){
	var receiver = $("#user-name").val();
	var phone = $("#user-phone").val();
	if( receiver.replace(/(^\s*)|(\s*$)/g, "").length ==0 ){
		alert('收件人不能为空');
		return;
	}
	//验证手机格式
	if( phone.replace(/(^\s*)|(\s*$)/g, "").length ==0 ){
		alert('手机号码不能为空');
		return;
	}
	if( !phone.match(/^1[0-9]{10}$/) ){
		alert('请输入正确手机号码');
		return;
	}

	document.getElementById("add").submit();
}

function setDefault(id){
	$.post(
		'/Api/AddressDefault',
		{"id":id},
		null
	);
}


</script>
	</body>

</html>