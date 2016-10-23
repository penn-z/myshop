<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0 ,minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>结算页面</title>

		<link href="/Public/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />

		<link href="/Public/basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link href="/Public/css/cartstyle.css" rel="stylesheet" type="text/css" />

		<link href="/Public/css/jsstyle.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="/Public/js/address.js"></script>

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
					$.post(
						'/Api/Goods/differentCart',
						null,
						function(ret){
							$("#J_MiniCartNum").text(ret);
						}
					);
					
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
			<div class="concent">
				<!--地址 -->
				<div class="paycont">
					<div class="address">
						<h3>确认收货地址 </h3>
						<div class="control">
							<div class="tc-btn createAddr theme-login am-btn am-btn-danger">使用新地址</div>
						</div>
						<div class="clear"></div>
						<ul>
							<div class="per-border"></div>
							<?php if(is_array($address)): foreach($address as $key=>$vo): ?><!-- 为默认地址时 -->
							<?php if(($vo["is_default"]) == "1"): ?><li class="user-addresslist defaultAddr" onclick="setAddress(this)">

								<div class="address-left">
									<div class="user DefaultAddr">

										<span class="buy-address-detail">   
                   						<span class="buy-user"><?php echo ($vo["receiver"]); ?> </span>
										<span class="buy-phone"><?php echo ($vo["rece_phone"]); ?></span>
										</span>
									</div>
									<div class="default-address DefaultAddr">
										<span class="buy-line-title buy-line-title-type">收货地址：</span>
										<span class="buy--address-detail">
								   			<span class="province"><?php echo ($vo["province"]); ?></span>
											<span class="city"><?php echo ($vo["city"]); ?></span>
											<span class="dist"><?php echo ($vo["district"]); ?></span>
											<span class="street"><?php echo ($vo["post_address"]); ?></span>
										</span>
									</div>
									<ins class="deftip">默认地址</ins>
								</div>
								<div class="address-right">
									<a href="/Public/person/address.html">
										<span class="am-icon-angle-right am-icon-lg"></span></a>
								</div>
								<div class="clear"></div>

								<div class="new-addr-btn">
									<a href="javascript:void(0)" class="hidden set_default">设为默认</a>
									<span class="new-addr-bar hidden">|</span>
									<input type="hidden" id="address_id" value="<?php echo ($vo["id"]); ?>" />
									<a href="#" class="theme-edit" onclick="editAddress(this)">编辑</a>
									<span class="new-addr-bar">|</span>
									<a href="javascript:void(0);" onclick="delOne(this);">删除</a>
								</div>

							</li>
							<?php else: ?>
							<div class="per-border"></div>
							<li class="user-addresslist" onclick="setAddress(this)">
								<div class="address-left">
									<div class="user DefaultAddr">

										<span class="buy-address-detail">   
                   						<span class="buy-user"><?php echo ($vo["receiver"]); ?> </span>
										<span class="buy-phone"><?php echo ($vo["rece_phone"]); ?></span>
										</span>
									</div>
									<div class="default-address DefaultAddr">
										<span class="buy-line-title buy-line-title-type">收货地址：</span>
										<span class="buy--address-detail">
									   		<span class="province"><?php echo ($vo["province"]); ?></span>
											<span class="city"><?php echo ($vo["city"]); ?></span>
											<span class="dist"><?php echo ($vo["district"]); ?></span>
											<span class="street"><?php echo ($vo["post_address"]); ?></span>
										</span>

										
									</div>
									<ins class="deftip hidden">默认地址</ins>
								</div>
								<div class="address-right">
									<span class="am-icon-angle-right am-icon-lg"></span>
								</div>
								<div class="clear"></div>

								<div class="new-addr-btn">
									<a href="javascript:void(0)" class="set_default">设为默认</a>
									<span class="new-addr-bar">|</span>
									<input type="hidden" id="address_id" value="<?php echo ($vo["id"]); ?>" />
									<a href="javascript:void(0)" class="theme-edit" onclick="editAddress(this)">编辑</a>
									<span class="new-addr-bar">|</span>
									<a href="javascript:void(0);"  onclick="delOne(this);">删除</a>
								</div>

							</li><?php endif; endforeach; endif; ?>
						<script type="text/javascript">
							$(document).ready(function(){							
								$(".set_default").click(function(){
									$(this).addClass("hidden").siblings(".new-addr-bar").eq(0).addClass("hidden");	//隐藏本地址的"设为默认"字样
									//显示本地址的"默认地址"字样
									$(this).parents(".user-addresslist").find(".deftip").removeClass("hidden");

									$(this).parents('.user-addresslist').siblings("li").find(".new-addr-btn").find(".set_default").removeClass("hidden").siblings(".new-addr-bar").removeClass("hidden");	//显示原默认地址的"设为默认"字样
									$(this).parents(".user-addresslist").siblings("li").find(".deftip").addClass("hidden");	//隐藏原默认地址的"默认地址"字样
									var id = $(this).siblings("#address_id").val();	//获取当前地址的id
									$.post(
										'/Api/AddressDefault',
										{"id":id},
										null
									);
								});
							});

							//删除一个地址
							function delOne(obj){
								var bool = window.confirm('确定删除吗?');
								if(bool!=true) return;
								var address_id = $(obj).siblings("#address_id").val();	//获取该地址的id
								window.location.href="/home/pay/delOne?address_id="+address_id;
							}

							//设置最下面的地址显示
							function setAddress(obj){
								var receiver = $(obj).find(".buy-user").text();	//收货人
								var rece_phone = $(obj).find(".buy-phone").text();	//电话
								var province = $(obj).find(".province").text();	//省份
								var city = $(obj).find(".city").text();	//城市
								var dist = $(obj).find(".dist").text();	//地区
								var street = $(obj).find(".street").text();	//详细街道

								$("#holyshit268").find(".province").text(province);	//设置省份
								$("#holyshit268").find(".city").text(city);	//设置城市
								$("#holyshit268").find(".dist").text(dist);	//设置地区
								$("#holyshit268").find(".street").text(street);	//设置详细街道
								$("#holyshit268").find(".buy-user").text(receiver);	//设置收货人
								$("#holyshit268").find(".buy-phone").text(rece_phone);	//设置电话
							}

							
						</script>

						</ul>

						<div class="clear"></div>
					</div>
					<!--物流 -->
					<div class="logistics">
						<h3>选择物流方式</h3>
						<ul class="op_express_delivery_hot">
							<li data-value="yuantong" class="OP_LOG_BTN  selected"><i class="c-gap-right" style="background-position:0px -468px"></i>圆通<span></span></li>
							<li data-value="shentong" class="OP_LOG_BTN  "><i class="c-gap-right" style="background-position:0px -1008px"></i>申通<span></span></li>
							<li data-value="yunda" class="OP_LOG_BTN  "><i class="c-gap-right" style="background-position:0px -576px"></i>韵达<span></span></li>
							<li data-value="zhongtong" class="OP_LOG_BTN op_express_delivery_hot_last "><i class="c-gap-right" style="background-position:0px -324px"></i>中通<span></span></li>
							<li data-value="shunfeng" class="OP_LOG_BTN  op_express_delivery_hot_bottom "><i class="c-gap-right" style="background-position:0px -180px"></i>顺丰<span></span></li>
						</ul>
					</div>
					<script>
						$(function(){
							$(".logistics").eq(0).find(".OP_LOG_BTN").each(function(){
								$(this).click(function(){

									$(this).removeClass("selected");	//无法取消快递选择框

									var express_style = $(this).text();	//获取点击后的快递
									var express_money = express_fee(express_style);	//得出此快递费用
									
									showFee(express_money);	//展示页面合计和实付款
									setExpress(express_style,express_money);
								})

							});
							
						});


					</script>
					<div class="clear"></div>
				
					<!--支付方式-->
					<div class="logistics">
						<h3>选择支付方式</h3>
						<ul class="pay-list">
							<li class="pay taobao selected"><img src="/Public/images/zhifubao.jpg" />支付宝<span></span></li>
							<li class="pay qq"><img src="/Public/images/weizhifu.jpg" />微信<span></span></li>
							<li class="pay card"><img src="/Public/images/wangyin.jpg" />银联<span></span></li>
						</ul>
					</div>
					<div class="clear"></div>
					<script>
						//无法取消支付方式框
						$(".pay-list").find("li").each(function(){
							$(this).click(function(){
								$(this).removeClass("selected");
							});
						});
					</script>
					<!--订单 -->
					<div class="concent">
						<div id="payTable">
							<h3>确认订单信息</h3>
							<div class="cart-table-th">
								<div class="wp">

									<div class="th th-item">
										<div class="td-inner">商品信息</div>
									</div>
									<div class="th th-price">
										<div class="td-inner">单价</div>
									</div>
									<div class="th th-amount">
										<div class="td-inner">数量</div>
									</div>
									<div class="th th-sum">
										<div class="td-inner">金额</div>
									</div>
									<!-- <div class="th th-oplist">
										<div class="td-inner">配送方式</div>
									</div> -->

								</div>
							</div>
							<div class="clear"></div>

							<tr class="item-list">
								<div class="bundle  bundle-last">

									<div class="bundle-main">
									<?php if(is_array($cart)): foreach($cart as $key=>$vo): ?><ul class="item-content clearfix">
											<div class="pay-phone">
												<li class="td td-item">
													<div class="item-pic">
														<a href="#" class="J_MakePoint">
															<img style="width:100%;height:100%;" src="<?php echo ($vo["goods_thumb"]); ?>"></a>
													</div>
													<div class="item-info">
														<div class="item-basic-info">
															<a href="#" class="item-title J_MakePoint" data-point="tbcart.8.11"><?php echo ($vo["goods_name"]); ?></a>
														</div>
													</div>
												</li>
												<li class="td td-info">
													<div class="item-props">
														<span class="sku-line"><?php echo ($vo["goods_type1"]); ?>：<?php echo ($vo["goods_type"]); ?></span>
														<span class="sku-line"><?php echo ($vo["goods_type2"]); ?>：<?php echo ($vo["goods_package"]); ?></span>
													</div>
												</li>
												<li class="td td-price">
													<div class="item-price price-promo-promo">
														<div class="price-content">
															<em class="J_Price price-now"><?php echo ($vo["goods_cost"]); ?></em>
														</div>
													</div>
												</li>
											</div>
											<li class="td td-amount">
												<div class="amount-wrapper ">
													<div class="item-amount ">
														<span class="phone-title">购买数量</span>
														<div class="sl">
															<input class="min am-btn" name="decrease" type="button" value="-" onclick="decrease(this)"/>
															<input class="text_box" name="" type="text" value="<?php echo ($vo["goods_num"]); ?>" style="width:30px;" onblur="writeNum(this)" onfocus="prevNum(this)" />
															<input class="add am-btn" name="increase" type="button" value="+" onclick="increase(this)"/>
															<!-- 设置此记录商品的购物车记录id -->
															<input type="hidden" id="cart_id" value="<?php echo ($vo["cart_id"]); ?>">
														</div>
													</div>
												</div>
											</li>
											<li class="td td-sum">
												<div class="td-inner">
													<em tabindex="0" class="J_ItemSum number"><?php echo ($vo["single_cost"]); ?></em>
												</div>
											</li>
											

										</ul><?php endforeach; endif; ?>

										<div class="clear"></div>
								<script>
								//展示页面时，调用以下函数
								$(function(){
									
									isOne();	//查看每条商品数量是否为1
									// alert($(".buy-agio").find("#express_charge").text());
									var express_style = $("ul:.op_express_delivery_hot").children("li:.selected").text();	//获取快递
									var express_money = express_fee(express_style);	//得出此快递费用
									showFee(express_money);	//展示页面合计和实付款
									setExpress(express_style,express_money);	//设置最下方快递信息

								});

								//展示页面合计和实付款
								function showFee(express_fee){
									var fee = 0;
									$(".J_ItemSum").each(function(){
										fee += parseFloat($(this).text());
									});
									fee += parseInt(express_fee);	//获取设置完成后的快递费
									$(".pay-sum").text(fee.toFixed(2));	//设置合计
									$("#J_ActualFee").text(fee.toFixed(2));	//设置实付款
								}

								//查看每条商品数量是否为1
								function isOne(){
									$(".text_box").each(function(){
										if( $(this).val() <= 1 ){
											$(this).prev().attr("disabled", true);
										} 
									});
								}


								//计算相应快递的价钱
								function express_fee(express_style){
									switch(express_style){
										case "圆通":
											var fee = 10;
										break;
										case "申通":
											var fee = 10;
										break;
										case "韵达":
											var fee = 12;
										break;
										case "中通":
											var fee = 15;
										break;
										case "顺丰":
											var fee = 20;
										break;
										default :
											var fee = 0;
									}
									return fee;
								}

								//往 快递与配送费用写上相应内容
								function setExpress(express_style,fee){
									$(".buy-agio").find("#express_style").text(express_style);	//设置快递
									$(".buy-agio").find("#express_charge").text(fee);	//设置快递费用
								}

								//减少按钮事件
								function decrease(obj){
									
									var single_cost = parseFloat($(obj).parents(".td-amount").prev().find(".price-now").text());	//获取单价
									var num = $(obj).next().val();	//获取数量
									num--;
									if( num<2 ){
										$(obj).attr("disabled", true);
										num = 1;
										$(obj).next().val(2);
									}

									var price = (single_cost * num).toFixed(2);	//得出单商品的金额
									$(obj).parents(".td-amount").next().find(".J_ItemSum").text(price);	//设置

									var express_style = $("ul:.op_express_delivery_hot").children("li:.selected").text();	//获取快递
									var express_money = express_fee(express_style);	//得出此快递费用
									showFee(express_money);	//展示页面合计和实付款
									var cart_id = $(obj).siblings("#cart_id").val();
									$.post(
										'/Api/Goods/GoodsNumDec',
										{"num":num,"cart_id":cart_id},
										function(ret){
											
										}
									);
								}

								//增加按钮事件
								function increase(obj){
									var single_cost = parseFloat($(obj).parents(".td-amount").prev().find(".price-now").text());	//获取单价
									var num = $(obj).prev().val();	//获取数量
									num++;
									if( num > 1 ){
										$(obj).prev().prev().attr("disabled", false);	//num大于1,desrease为enabled
									}

									var price = (single_cost * num).toFixed(2);	//得出单商品的金额
									$(obj).parents(".td-amount").next().find(".J_ItemSum").text(price);	
									
									var express_style = $("ul:.op_express_delivery_hot").children("li:.selected").text();	//获取快递
									var express_money = express_fee(express_style);	//得出此快递费用
									showFee(express_money);	//展示页面合计和实付款
									var cart_id = $(obj).siblings("#cart_id").val();
									$.post(
										'/Api/Goods/GoodsNumInc',
										{"num":num,"cart_id":cart_id},
										function(ret){
											
										}
									);
									
								}

								//改变数量获得焦点时事件
								var front_num = 0;
								function prevNum(obj){
									var prev_num = $(obj).val();	//获取该条商品数量
									front_num = prev_num;
								}

								//自己填写商品数量时触发事件
								function writeNum(obj){
									var goods_num = $(obj).val();	//获取该条商品数量

									//当输入为小数时，不予接受，替换回原来的数字
									if( parseInt(goods_num)!=goods_num ){
										goods_num = front_num;
										$(obj).val(goods_num);
									}


									//当输入的数量小于1 或 不为数字时
									if( isNaN(goods_num) || goods_num<=1 ){
										goods_num = 1;
										$(obj).val('1');
										$(obj).prev().attr("disabled",true);	//设置"-"键为disabled
									}else{
										$(obj).prev().attr("disabled",false);	//输出数量大于1，"-"可活动
									}
									
									var single_cost = parseFloat($(obj).parents(".td-amount").prev().find(".price-now").text());	//获取单价
									var price = (single_cost * goods_num).toFixed(2);	//得出该条商品的金额
									//设置该条商品金额
									$(obj).parents(".td-amount").next().find(".J_ItemSum").text(price);

									var express_style = $("ul:.op_express_delivery_hot").children("li:.selected").text();	//获取快递
									var express_money = express_fee(express_style);	//得出此快递费用
									showFee(express_money);	//展示页面合计和实付款
									var cart_id = $(obj).siblings("#cart_id").val();
									$.post(
										'/Api/Goods/GoodsNumChange',
										{"cart_id":cart_id,"num":goods_num},
										function(ret){

										}
									)
										
								}

								
								</script>
									</div>
								</div>
							</tr>
							<div class="clear"></div>
						</div>

					</div>
							<div class="clear"></div>
							<div class="pay-total">
						<!--留言-->
							<div class="order-extra">
								<div class="order-user-info">
									<div id="holyshit257" class="memo">
										<label>买家留言：</label>
										<input type="text" title="选填,对本次交易的说明（建议填写已经和卖家达成一致的说明）" placeholder="选填,建议填写和卖家达成一致的说明，最多输入500字" class="memo-input J_MakePoint c2c-text-default memo-close">
										<div class="msg hidden J-msg">
											<p class="error">最多输入500个字符</p>
										</div>
										
									</div>
								</div>

							</div>
							<!--优惠券 -->
							<div class="buy-agio">
								<li class="td td-express">
									<span style="display: block;float:left;width:390px;text-align:left;color:grey;" class="express-title">快递：<span id="express_style" >顺丰</span></span>
								</li>
								<li class="td td-charge">
									<span style="display: block;float:left;width:390px;text-align:left;color:grey;" class="charge-title">配送费用：<span id="express_charge">222</span>元</span>
								</li>
								<li class="td td-coupon">
									<span class="coupon-title">优惠券(未实现)</span>
									<select data-am-selected>
										<option value="8">
											<div class="c-price">
												<strong>￥8</strong>
											</div>
											<div class="c-limit">
												【消费满95元可用】
											</div>
										</option>
										<option value="3" selected>
											<div class="c-price">
												<strong>￥3</strong>
											</div>
											<div class="c-limit">
												【无使用门槛】
											</div>
										</option>
									</select>
								</li>

								<li class="td td-bonus">

									<span class="bonus-title">红包(未实现)</span>
									<select data-am-selected>
										<option value="a">
											<div class="item-info">
												¥50.00<span>元</span>
											</div>
											<div class="item-remainderprice">
												<span>还剩</span>10.40<span>元</span>
											</div>
										</option>
										<option value="b" selected>
											<div class="item-info">
												¥50.00<span>元</span>
											</div>
											<div class="item-remainderprice">
												<span>还剩</span>50.00<span>元</span>
											</div>
										</option>
									</select>

								</li>

							</div>
							<div class="clear"></div>
							</div>
							<!--含运费小计 -->
							<div class="buy-point-discharge ">
								<p class="price g_price ">
									合计（含运费） <span>¥</span><em class="pay-sum"></em>
								</p>
							</div>

							<!--信息 -->
							<div class="order-go clearfix">
								<div class="pay-confirm clearfix">
									<div class="box">
										<div tabindex="0" id="holyshit267" class="realPay"><em class="t">实付款：</em>
											<span class="price g_price ">
                                    <span>¥</span> <em class="style-large-bold-red " id="J_ActualFee"></em>
											</span>
										</div>

										<div id="holyshit268" class="pay-address">
											<p class="buy-footer-address">
												<span class="buy-line-title buy-line-title-type">寄送至：</span>
												<span class="buy--address-detail">
									   				<span class="province"><?php echo ($address["0"]["province"]); ?></span>
													<span class="city"><?php echo ($address["0"]["city"]); ?></span>
													<span class="dist"><?php echo ($address["0"]["district"]); ?></span>
													<span class="street"><?php echo ($address["0"]["post_address"]); ?></span>
												</span>
												
											</p>
											<p class="buy-footer-address">
												<span class="buy-line-title">收货人：</span>
													<span class="buy-address-detail">   
	                                         		<span class="buy-user"><?php echo ($address["0"]["receiver"]); ?></span>
													<span class="buy-phone"><?php echo ($address["0"]["rece_phone"]); ?></span>
												</span>
											</p>
										</div>
									</div>

									<div id="holyshit269" class="submitOrder">
										<div class="go-btn-wrap">
											<a id="J_Go" href="javascript:void(0);" class="btn-go" tabindex="0" title="点击此按钮，提交订单" onclick="subOrder()">提交订单</a>
										</div>
									</div>
									<div class="clear"></div>
								</div>
							</div>
						</div>

						<div class="clear"></div>
					</div>
					<script>
						function subOrder(){
							//获取物流信息
							var receiver = $("#holyshit268").find(".buy-user").text();
							var phone = $("#holyshit268").find(".buy-phone").text();
							var province = $("#holyshit268").find(".province").text();
							var city = $("#holyshit268").find(".city").text();
							var dist = $("#holyshit268").find(".dist").text();
							var street = $("#holyshit268").find(".street").text();
							var express_style = $(".buy-agio").find("#express_style").text();	//获取快递
							var express_fee = $(".buy-agio").find("#express_charge").text();	//获取快递费用
							var total_money = $("#J_ActualFee").text();
							var express = {"receiver":receiver,"phone":phone,"province":province,"city":city,"district":dist,"street":street,"express_style":express_style,"express_fee":express_fee,"total_money":total_money};	//把物流信息定义为对象
							var message = $(".order-extra").find("input").val();
							//获取要结算商品的购物车id
							var cart_array = [];
							$(".td-amount").each(function(){
								var cart_id = $(this).find("#cart_id").val();
								cart_array.push(cart_id);
							});
							$.post(
								'/Api/Goods/makeOrder',
								{express:express,cart_array:cart_array,message:message},
								function(ret){
									window.location.href="/home/pay/success?order_id="+ret;
								}
							);
							
						}
					</script>
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

			<!-- 新增地址 -->
			<div class="theme-popover-mask"></div>
			<div class="theme-popover">

				<!--标题 -->
				<div class="am-cf am-padding">
					<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">新增地址</strong> / <small>Add address</small></div>
				</div>
				<hr/>

				<div class="am-u-md-12">
					<form class="am-form am-form-horizontal" id="add_address" action="/home/pay/addAddress" method="post">

						<div class="am-form-group">
							<label for="user-name" class="am-form-label">收货人</label>
							<div class="am-form-content">
								<input type="text" id="user-name" name="receive[receiver]" placeholder="收货人">
							</div>
						</div>

						<div class="am-form-group">
							<label for="user-phone" class="am-form-label">手机号码</label>
							<div class="am-form-content">
								<input id="user-phone" placeholder="手机号必填" name="receive[rece_phone]" maxlength="11">
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
								<textarea class="" rows="3" id="user-intro" name="receive[post_address]" placeholder="输入详细地址"  maxlength="100" ></textarea>
								<small>100字以内写出你的详细地址...</small>
							</div>
						</div>

						<div class="am-form-group theme-poptit">
							<div class="am-u-sm-9 am-u-sm-push-3">
								<div class="am-btn am-btn-danger" onclick="addAddress()">保存</div>
								<div class="am-btn am-btn-danger close">取消</div>
							</div>
						</div>
					</form>
				</div>

			</div>
		
			

			<script>
				//新增地址
				function addAddress(){
					var receiver = $(".am-u-md-12").find("#user-name").val();
					var phone = $(".am-u-md-12").find("#user-phone").val();
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

					document.getElementById("add_address").submit();
				}

			</script>
			<div class="clear"></div>
			
			<!-- 编辑地址界面 -->
			<div class="theme-popover-mask"></div>
			<div class="theme-popover-address">

				<!--标题 -->
				<div class="am-cf am-padding">
					<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">编辑地址</strong> / <small>Edit address</small></div>
				</div>
				<hr/>

				<div class="am-u-md-13">
					<form class="am-form am-form-horizontal" id="edit_address" action="/home/pay/editAddress" method="post">

						<div class="am-form-group">
							<label for="user-name" class="am-form-label">收货人</label>
							<div class="am-form-content" id="id_sign">
								<input type="text" id="user-name" name="receive[receiver]" placeholder="收货人">
							</div>
						</div>

						<div class="am-form-group">
							<label for="user-phone" class="am-form-label">手机号码</label>
							<div class="am-form-content">
								<input id="user-phone" placeholder="手机号必填" name="receive[rece_phone]" maxlength="11">
							</div>
						</div>

						<div class="am-form-group">
							<label for="user-address" class="am-form-label">所在地</label>
							<div class="am-form-content address">
								        <div data-toggle="distpicker">
          <div class="form-group">
            <select class="form-control" id="province" name="receive[province]" ></select>
          </div>
          <div class="form-group">
            <select class="form-control" id="city" name="receive[city]" ></select>
          </div>
          <div class="form-group">
            <select class="form-control" id="district" name="receive[district]" ></select>
          </div>
        </div>



							</div>
						</div>

						<div class="am-form-group">
							<label for="user-intro" class="am-form-label">详细地址</label>
							<div class="am-form-content">
								<textarea class="" rows="3" id="user-intro" name="receive[post_address]" placeholder="输入详细地址"  maxlength="100" ></textarea>
								<small>100字以内写出你的详细地址...</small>
							</div>
						</div>

						<div class="am-form-group theme-poptit">
							<div class="am-u-sm-9 am-u-sm-push-3">
								<div class="am-btn am-btn-danger" onclick="saveAddress()">修改</div>
								<div class="am-btn am-btn-danger close">取消</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<script>
				//点击编辑地址
				function editAddress(obj){
					var receiver = $(obj).parents(".user-addresslist").find(".buy-user").text();	//收货人
					var rece_phone = $(obj).parents(".user-addresslist").find(".buy-phone").text();	//电话
					var province = $(obj).parents(".user-addresslist").find(".province").text();	//省份
					var city = $(obj).parents(".user-addresslist").find(".city").text();	//城市
					var dist = $(obj).parents(".user-addresslist").find(".dist").text();	//地区
					var street = $(obj).parents(".user-addresslist").find(".street").text();	//详细街道

					//赋值
					$(".theme-popover-address").find("#user-name").val(receiver);
					$(".theme-popover-address").find("#user-phone").val(rece_phone);
					
					$(".theme-popover-address").find("#province").find('option').each(function(){
						var val = $(this).attr('value');
						if ( val == province )
						{

							$(this).prop('selected', true).trigger('change.distpicker');
						}
					});

					$(".theme-popover-address").find("#city").find('option').each(function(){
						var val = $(this).attr('value');
						if ( val == city )
						{

							$(this).prop('selected', true).trigger('change.distpicker');
						}
					});
					
					$(".theme-popover-address").find("#district").find('option').each(function(){
						var val = $(this).attr('value');
						if ( val == dist )
						{

							$(this).prop('selected', true).trigger('change.distpicker');
						}
					});

					$(".theme-popover-address").find("#user-intro").val(street);
				}

				
				//修改地址
				function saveAddress(){
					var receiver = $(".am-u-md-13").find("#user-name").val();
					var phone = $(".am-u-md-13").find("#user-phone").val();
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
					var address_id = $(".user-addresslist.defaultAddr").find("#address_id").val();
					$(".theme-popover-address").find("#id_sign").append("<input type='hidden' name='address_id' value='"+address_id+"'>");
					document.getElementById("edit_address").submit();
				}

				
			</script>
	</body>

</html>