<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>商品页面</title>
	
		<link href="/Public/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />
		<link href="/Public/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="/Public/basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link type="text/css" href="/Public/css/optstyle.css" rel="stylesheet" />
		<link type="text/css" href="/Public/css/style.css" rel="stylesheet" />
		<link href="/Public/Admin/css/webmallDialog.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="/Public/basic/js/jquery-1.7.min.js"></script>
		<script type="text/javascript" src="/Public/basic/js/quick_links.js"></script>
		<script type="text/javascript" src="/Public/Admin/js/JWin.js"></script>


		<script type="text/javascript" src="/Public/AmazeUI-2.4.2/assets/js/amazeui.js"></script>

		<script type="text/javascript" src="/Public/js/jquery.imagezoom.min.js"></script>
		<script type="text/javascript" src="/Public/js/jquery.flexslider.js"></script>
		<script type="text/javascript" src="/Public/js/list.js"></script>
		
		<script src="/Public/js/jquery.fly.min.js"></script>
		<style>
		.u-flyer{display: block;width: 50px;height: 50px;border-radius: 50px;position: fixed;z-index: 9999;}
		#success_msg{position:fixed; top:300px; right:35px; z-index:10000; width:1px; height:52px; line-height:52px; font-size:20px; text-align:center; color:#fff; background:#360; display:none}
		.to_hidden{display:none;}
		.comment-pic img{display:block;width:80px;height:80px;background:blue;float:left;margin-left:10px;}
		</style>
	</head>

	<body>

		<!-- 头部 -->
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
					<a name="key_word" href="/home/search.html"></a>
					<form action="/home/search.html" method="get">
						<input id="searchInput" name="key_word" type="text" placeholder="搜索" autocomplete="off">
						<input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
					</form>
				</div>
			</div>
			<script>
				
			</script>
	
		<!-- 头部 -->
			<div class="clear"></div>

            <b class="line"></b>
			<div class="listMain">

				<!--分类-->
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
				<ol class="am-breadcrumb am-breadcrumb-slash">
					<li><a href="#">首页</a></li>
					<li><a href="#">分类</a></li>
					<li class="am-active">内容</li>
				</ol>
				<script type="text/javascript">
					$(window).load(function() {
						$('.flexslider').flexslider({
							animation: "slide",
							start: function(slider) {
								$('body').removeClass('loading');
							}
						});
					});
				</script>
				<div class="scoll">
					<section class="slider">
						<div class="flexslider">
							<ul class="slides">
							<?php $__FOR_START_370810664__=0;$__FOR_END_370810664__=3;for($i=$__FOR_START_370810664__;$i < $__FOR_END_370810664__;$i+=1){ if(($i) == "0"): ?><li>
									<img src="<?php echo ($thumb["big"]["$i"]); ?>" title="pic" />
								</li>
								<?php else: ?>
								<li>
									<img src="<?php echo ($thumb["big"]["$i"]); ?>" />
								</li><?php endif; } ?>	
							</ul>
						</div>
					</section>
				</div>

				<!--放大镜-->

				<div class="item-inform">
					<div class="clearfixLeft" id="clearcontent">

						<div class="box">
							<script type="text/javascript">
								$(document).ready(function() {
									$(".jqzoom").imagezoom();
									$("#thumblist li a").click(function() {
										$(this).parents("li").addClass("tb-selected").siblings().removeClass("tb-selected");
										$(".jqzoom").attr('src', $(this).find("img").attr("mid"));
										$(".jqzoom").attr('rel', $(this).find("img").attr("big"));
									});
								});
							</script>

							<div class="tb-booth tb-pic tb-s310">
								<a href="<?php echo ($thumb["big"]["0"]); ?>"><img src="<?php echo ($thumb["big"]["0"]); ?>" alt="细节展示放大镜特效" rel="<?php echo ($thumb["big"]["0"]); ?>" class="jqzoom" /></a>
							</div>
							<ul class="tb-thumb" id="thumblist">
							<?php $__FOR_START_1976477485__=0;$__FOR_END_1976477485__=3;for($i=$__FOR_START_1976477485__;$i < $__FOR_END_1976477485__;$i+=1){ if(($i) == "0"): ?><li class="tb-selected">
									<div class="tb-pic tb-s40">
										<a href="#"><img id="add_shopcart" src="<?php echo ($thumb["small"]["$i"]); ?>" mid="<?php echo ($thumb["mid"]["$i"]); ?>" big="<?php echo ($thumb["big"]["$i"]); ?>"></a>
									</div>
								</li>
								<?php else: ?>
								<li>
									<div class="tb-pic tb-s40">
										<a href="#"><img src="<?php echo ($thumb["small"]["$i"]); ?>" mid="<?php echo ($thumb["mid"]["$i"]); ?>" big="<?php echo ($thumb["big"]["$i"]); ?>"></a>
									</div>
								</li><?php endif; } ?>
							</ul>
	
							
						</div>

						<div class="clear"></div>
					</div>

					<div class="clearfixRight">

						<!--规格属性-->
						<!--名称-->
						<div class="tb-detail-hd">
							<h1>	
				 			<?php echo ($goods["goods_name"]); ?>
	          				</h1>
						</div>
						<div class="tb-detail-list">
							<!--价格-->
							<div class="tb-detail-price">
								<li class="price iteminfo_price">
									<dt>促销价</dt>
									<dd><em>¥</em><b class="sys_item_price"><?php echo ($specify["0"]["goods_discount"]); ?></b></dd>                                 
								</li>
								<li class="price iteminfo_mktprice">
									<dt>原价</dt>
									<dd><em>¥</em><b class="sys_item_mktprice"><?php echo ($specify["0"]["goods_price"]); ?></b></dd>									
								</li>
								<div class="clear"></div>
							</div>

							<!--地址-->
							<dl class="iteminfo_parameter freight">
								<dt>配送至</dt>
								<div class="iteminfo_freprice">
									<div class="am-form-content address">
										<select data-am-selected>
											<option value="a">浙江省</option>
											<option value="b">湖北省</option>
										</select>
										<select data-am-selected>
											<option value="a">温州市</option>
											<option value="b">武汉市</option>
										</select>
										<select data-am-selected>
											<option value="a">瑞安区</option>
											<option value="b">洪山区</option>
										</select>
									</div>
									<div class="pay-logis">
										快递<b class="sys_item_freprice">10</b>元
									</div>
								</div>
							</dl>
							<div class="clear"></div>

							<!--销量-->
							<ul class="tm-ind-panel">
								<li class="tm-ind-item tm-ind-sellCount canClick">
									<div class="tm-indcon"><span class="tm-label">月销量</span><span class="tm-count"><?php echo ($goods["month_sales"]); ?></span></div>
								</li>
								<li class="tm-ind-item tm-ind-sumCount canClick">
									<div class="tm-indcon"><span class="tm-label">累计销量</span><span class="tm-count"><?php echo ($goods["cumulative_sales"]); ?></span></div>
								</li>
								<li class="tm-ind-item tm-ind-reviewCount canClick tm-line3">
									<div class="tm-indcon"><span class="tm-label">累计评价</span><span class="tm-count"><?php echo ($goods["goods_evaluation"]); ?></span></div>
								</li>
							</ul>
							<div class="clear"></div>

							<!--各种规格-->
							<dl class="iteminfo_parameter sys_item_specpara">
								<dt class="theme-login"><div class="cart-title">可选规格<span class="am-icon-angle-right"></span></div></dt>
								<dd>
									<!--操作页面-->

									<div class="theme-popover-mask"></div>

									<div class="theme-popover">
										<div class="theme-span"></div>
										<div class="theme-poptit">
											<a href="javascript:;" title="关闭" class="close">×</a>
										</div>
										<div class="theme-popbod dform">
											<form class="theme-signin" name="loginform" action="/home/pay" method="post" id="loginform">

												<div class="theme-signin-left">

													<div class="theme-options">
														<div class="cart-title"><?php echo ($goods["goods_type"]); ?></div>
														<ul id="type">
															<?php if(is_array($type)): foreach($type as $key=>$vo): if($key == 0): ?><li class="sku-line selected sel_type" onclick="change_attr(this)"><?php echo ($vo); ?><i></i></li>
																<?php else: ?>
																<li class="sku-line" onclick="change_attr(this)"><?php echo ($vo); ?><i></i></li><?php endif; endforeach; endif; ?>
														</ul>
													</div>
													<script>
														function change_attr(ret){
															var data = $(ret).text();
															var goods_id = <?php echo ($_GET['id']); ?>;
															$.post(
																'/Api/Goods/change_type',
																{"data":data,"goods_id":goods_id},
																function(ret){
																	var obj = eval('('+ret+')');
																	$(".sys_item_price").text(obj.goods_discount);
																	$(".sys_item_mktprice").text(obj.goods_price);
																	$(".stock").eq(0).text(obj.goods_num);
																},
																'html'
															);
														}

														//口味的必须选择
														$(".sku-line").click(function(){
															$(this).parents("ul").find(".sku-line").each(function(){
																	$(this).removeClass("selected");
															});
														});
													</script>
													<div class="theme-options">
														<div class="cart-title"><?php echo ($goods["goods_type2"]); ?></div>
														<ul id="package">
															<?php if(is_array($type2_name)): foreach($type2_name as $key=>$vo): if($key == 0): ?><li class="sku-line selected"><?php echo ($vo); ?><i></i></li>
																<?php else: ?>
																<li class="sku-line"><?php echo ($vo); ?><i></i></li><?php endif; endforeach; endif; ?>
														</ul>
													</div>
													<script>
														//必须选择包装规格
														$(".sku-line").click(function(){
															$(this).parents("ul").find(".sku-line").each(function(){
																	$(this).removeClass("selected");
															});
														});
													</script>
													<div class="theme-options">
														<div class="cart-title number">数量</div>
														<dd>
															<input id="min" class="am-btn am-btn-default" name="" type="button" value="-" />
															<input id="text_box" name="" type="text" value="1" style="width:30px;" />
															<input id="add" class="am-btn am-btn-default" name="" type="button" value="+" />
															<span id="Stock" class="tb-hidden">库存<span class="stock"><?php echo ($specify["0"]["goods_num"]); ?></span>件</span>
														</dd>

													</div>
													<div class="clear"></div>

													<div class="btn-op">
														<div class="btn am-btn am-btn-warning">确认</div>
														<div class="btn close am-btn am-btn-warning">取消</div>
													</div>
												</div>
												<div class="theme-signin-right">
													<div class="img-info">
														<img src="/Public/images/songzi.jpg" />
													</div>
													<div class="text-info">
														<span class="J_Price price-now">¥39.00</span>
														<span id="Stock" class="tb-hidden">库存<span class="stock">1000</span>件</span>
													</div>
												</div>

											</form>
										</div>
									</div>

								</dd>
							</dl>
							<div class="clear"></div>
							<!--活动	-->
							<div class="shopPromotion gold">
								<div class="hot">
									<dt class="tb-metatit">店铺优惠</dt>
									<div class="gold-list">
										<p>购物满2件打8折，满3件7折<span>点击领券<i class="am-icon-sort-down"></i></span></p>
									</div>
								</div>
								<div class="clear"></div>
								<div class="coupon">
									<dt class="tb-metatit">优惠券</dt>
									<div class="gold-list">
										<ul>
											<li>125减5</li>
											<li>198减10</li>
											<li>298减20</li>
										</ul>
									</div>
								</div>
							</div>
						</div>

						<div class="pay">
							<div class="pay-opt">
							<a href="home.html"><span class="am-icon-home am-icon-fw">首页</span></a>
							<a><span class="am-icon-heart am-icon-fw">收藏</span></a>
							
							</div>
							<li>
								<div class="clearfix tb-btn tb-btn-buy theme-login">
									<a id="LikBuy" title="点此按钮到下一步确认购买信息" href="javascript:void(0)">立即购买</a>
								</div>
							</li>
							<li>
								<div class="clearfix tb-btn tb-btn-basket theme-login">
									<a id="LikBasket" title="加入购物车" href="javascript:void(0);"><i></i>加入购物车</a>
								</div>
							</li>
						</div>
						
					</div>
					<script>
					//加入购物车效果
					$(function() {
						var offset = $("#end").offset();
						$("#LikBasket").click(function(event){

							//ajax异步处理商品入数据库
							var type = $("#type").find('.selected').text();
							var package = $("#package").find(".selected").text();
							var num = $("#text_box").val();
							var goods_id = <?php echo ($_GET['id']); ?>;	//获取该商品id
							var goods_name = "<?php echo ($goods["goods_name"]); ?>";	//获取该商品名称
							var goods_price = $(".sys_item_price").text();
							var goods_type1 = $(".theme-popover").find(".cart-title").eq(0).text();//规格1名称
							var goods_type2 = $(".theme-popover").find(".cart-title").eq(1).text();//规格2名称
							$.post(
								'/Api/Goods/shopCart',
								{"goods_type":type,"goods_package":package,"goods_num":num,"goods_id":goods_id,"goods_name":goods_name,"goods_cost":goods_price,"goods_type1":goods_type1,"goods_type2":goods_type2},
								function(ret){
									//未登陆无法加入购物车
									if( ret == 1){
										window.location.href="/home/login";
										exit(); 	
									}
									var different_goods = ret;

									//购物车fly效果
									var addcar = $(event);
									var img = $("#add_shopcart").attr('mid');
									var flyer = $('<img class="u-flyer" src="'+img+'">');
									var scrollTop = $(window).scrollTop();	//当前滚动条滚动高度
									flyer.fly({
										start: {
											left: event.pageX,
											top: event.pageY-(scrollTop+60)
										},
										end: {
											left: offset.left+10,
											top: offset.top+10,
											width: 0,
											height: 0
										},
										onEnd: function(){
											$(".cart_num").text(different_goods);	//改变右侧购物车显示数量
											$("#J_MiniCartNum").text(different_goods);//改变上部导航条的购物车
										}
									});
								}
							);
								

						});
					});

					//点击立即购买
					$("#LikBuy").click(function(){
						var type = $("#type").find('.selected').text();
						var package = $("#package").find(".selected").text();
						var num = $("#text_box").val();
						var goods_id = <?php echo ($_GET['id']); ?>;	//获取该商品id
						var goods_name = "<?php echo ($goods["goods_name"]); ?>";	//获取该商品名称
						var goods_price = $(".sys_item_price").text();
						var goods_type1 = $(".theme-popover").find(".cart-title").eq(0).text();//规格1名称
						var goods_type2 = $(".theme-popover").find(".cart-title").eq(1).text();//规格2名称
						var is_order = 1;
						$.post(
							'/Api/Goods/buyNow',
							{"goods_type":type,"goods_package":package,"goods_num":num,"goods_id":goods_id,"goods_name":goods_name,"goods_cost":goods_price,"is_order":is_order,"goods_type1":goods_type1,"goods_type2":goods_type2},
							function(ret){
								//未登陆无法加入立即购买
								if( ret == 1){
									window.location.href="/home/login";
									exit();
								}
								// alert(ret);
								window.location.href="/home/pay";
							}
						);
					});
					</script>
					<div class="clear"></div>

				</div>

				<!--优惠套装-->
				<div class="match">
					<div class="match-title">优惠套装</div>
					<div class="match-comment">
						<ul class="like_list">
							<li>
								<div class="s_picBox">
									<a class="s_pic" href="#"><img src="/Public/images/cp.jpg"></a>
								</div> <a class="txt" target="_blank" href="#">萨拉米 1+1小鸡腿</a>
								<div class="info-box"> <span class="info-box-price">¥ 29.90</span> <span class="info-original-price">￥ 199.00</span> </div>
							</li>
							<li class="plus_icon"><i>+</i></li>
							<li>
								<div class="s_picBox">
									<a class="s_pic" href="#"><img src="/Public/images/cp2.jpg"></a>
								</div> <a class="txt" target="_blank" href="#">ZEK 原味海苔</a>
								<div class="info-box"> <span class="info-box-price">¥ 8.90</span> <span class="info-original-price">￥ 299.00</span> </div>
							</li>
							<li class="plus_icon"><i>=</i></li>
							<li class="total_price">
								<p class="combo_price"><span class="c-title">套餐价:</span><span>￥35.00</span> </p>
								<p class="save_all">共省:<span>￥463.00</span></p> <a href="#" class="buy_now">立即购买</a> </li>
							<li class="plus_icon"><i class="am-icon-angle-right"></i></li>
						</ul>
					</div>
				</div>
				<div class="clear"></div>
				
							
				<!-- introduce-->

				<div class="introduce">
					<div class="browse">
					    <div class="mc"> 
						     <ul>					    
						     	<div class="mt">            
						            <h2>看了又看</h2>        
					            </div>
						     	
							      <li class="first">
							      	<div class="p-img">                    
							      		<a  href="#"> <img class="" src="/Public/images/browse1.jpg"> </a>               
							      	</div>
							      	<div class="p-name"><a href="#">
							      		【三只松鼠_开口松子】零食坚果特产炒货东北红松子原味
							      	</a>
							      	</div>
							      	<div class="p-price"><strong>￥35.90</strong></div>
							      </li>
							      <li>
							      	<div class="p-img">                    
							      		<a  href="#"> <img class="" src="/Public/images/browse1.jpg"> </a>               
							      	</div>
							      	<div class="p-name"><a href="#">
							      		【三只松鼠_开口松子】零食坚果特产炒货东北红松子原味
							      	</a>
							      	</div>
							      	<div class="p-price"><strong>￥35.90</strong></div>
							      </li>
							      <li>
							      	<div class="p-img">                    
							      		<a  href="#"> <img class="" src="/Public/images/browse1.jpg"> </a>               
							      	</div>
							      	<div class="p-name"><a href="#">
							      		【三只松鼠_开口松子】零食坚果特产炒货东北红松子原味
							      	</a>
							      	</div>
							      	<div class="p-price"><strong>￥35.90</strong></div>
							      </li>							      
							      <li>
							      	<div class="p-img">                    
							      		<a  href="#"> <img class="" src="/Public/images/browse1.jpg"> </a>               
							      	</div>
							      	<div class="p-name"><a href="#">
							      		【三只松鼠_开口松子】零食坚果特产炒货东北红松子原味
							      	</a>
							      	</div>
							      	<div class="p-price"><strong>￥35.90</strong></div>
							      </li>							      
							      <li>
							      	<div class="p-img">                    
							      		<a  href="#"> <img class="" src="/Public/images/browse1.jpg"> </a>               
							      	</div>
							      	<div class="p-name"><a href="#">
							      		【三只松鼠_开口松子218g】零食坚果特产炒货东北红松子原味
							      	</a>
							      	</div>
							      	<div class="p-price"><strong>￥35.90</strong></div>
							      </li>							      
					      
						     </ul>					
					    </div>
					</div>
					<div class="introduceMain">
						<div class="am-tabs" data-am-tabs>
							<ul class="am-avg-sm-3 am-tabs-nav am-nav am-nav-tabs">
								<li class="am-active">
									<a href="#">

										<span class="index-needs-dt-txt">宝贝详情</span></a>

								</li>

								<li>
									<a href="#">

										<span class="index-needs-dt-txt">全部评价</span></a>

								</li>

								<li>
									<a href="#">

										<span class="index-needs-dt-txt">猜你喜欢</span></a>
								</li>
							</ul>

							<div class="am-tabs-bd">
								
								<div class="am-tab-panel am-fade am-in am-active">
								
									<div class="J_Brand">
																	
										<div class="attr-list-hd tm-clear">
											<h4>产品参数：</h4></div>
										<div class="clear"></div>
										<ul id="J_AttrUL">
											<li title="">产品类型:&nbsp;烘炒类</li>
											<li title="">原料产地:&nbsp;巴基斯坦</li>
											<li title="">产地:&nbsp;湖北省武汉市</li>
											<li title="">配料表:&nbsp;进口松子、食用盐</li>
											<li title="">产品规格:&nbsp;210g</li>
											<li title="">保质期:&nbsp;180天</li>
											<li title="">产品标准号:&nbsp;GB/T 22165</li>
											<li title="">生产许可证编号：&nbsp;QS4201 1801 0226</li>
											<li title="">储存方法：&nbsp;请放置于常温、阴凉、通风、干燥处保存 </li>
											<li title="">食用方法：&nbsp;开袋去壳即食</li>
										</ul>
										<div class="clear"></div>
									</div>
																	
									<div class="details">
										<div class="attr-list-hd after-market-hd">
											<h4>商品细节</h4>
										</div>

										<div class="twlistNews">
										<?php echo ($goods["goods_description"]); ?>
											<!-- <img src="/Public/images/tw1.jpg" />
											<img src="/Public/images/tw2.jpg" />
											<img src="/Public/images/tw3.jpg" />
											<img src="/Public/images/tw4.jpg" />
											<img src="/Public/images/tw5.jpg" />
											<img src="/Public/images/tw6.jpg" />
											<img src="/Public/images/tw7.jpg" />  -->
										</div>
									</div>
									<div class="clear"></div>
								
								</div>

								<div class="am-tab-panel am-fade" >
									
                                    <div class="actor-new">
                                    	<div class="rate">                
                                    		<strong><?php echo (round($good_num/$total_num*100,2)); ?><span>%</span></strong><br> <span>好评度</span>            
                                    	</div>
                                        <dl>                    
                                            <dt>买家印象</dt>                    
                                            <dd class="p-bfc">
                                            			<q class="comm-tags"><span>味道不错</span><em>(2177)</em></q>
                                            			<q class="comm-tags"><span>颗粒饱满</span><em>(1860)</em></q>
                                            			<q class="comm-tags"><span>口感好</span><em>(1823)</em></q>
                                            			<q class="comm-tags"><span>商品不错</span><em>(1689)</em></q>
                                            			<q class="comm-tags"><span>香脆可口</span><em>(1488)</em></q>
                                            			<q class="comm-tags"><span>个个开口</span><em>(1392)</em></q>
                                            			<q class="comm-tags"><span>价格便宜</span><em>(1119)</em></q>
                                            			<q class="comm-tags"><span>特价买的</span><em>(865)</em></q>
                                            			<q class="comm-tags"><span>皮很薄</span><em>(831)</em></q> 
                                            </dd>                                           
                                         </dl> 
                                    </div>	
                                    <div class="clear"></div>
									<div class="tb-r-filter-bar">
										<ul class=" tb-taglist am-avg-sm-4">
											<li class="tb-taglist-li tb-taglist-li-current">
												<div class="comment-info">
													<span style="cursor:pointer;" onclick="showTab(this,'cTab')">全部评价</span>
													<span class="tb-tbcr-num"><?php echo ($total_num); ?></span>
												</div>
											</li>

											<li class="tb-taglist-li tb-taglist-li-1">
												<div class="comment-info">
													<span style="cursor:pointer;" onclick="showTab(this,'cTab')">好评</span>
													<span class="tb-tbcr-num"><?php echo ($good_num); ?></span>
												</div>
											</li>

											<li class="tb-taglist-li tb-taglist-li-0">
												<div class="comment-info">
													<span style="cursor:pointer;" onclick="showTab(this,'cTab')">中评</span>
													<span class="tb-tbcr-num"><?php echo ($mid_num); ?></span>
												</div>
											</li>

											<li class="tb-taglist-li tb-taglist-li--1">
												<div class="comment-info">
													<span style="cursor:pointer;" onclick="showTab(this,'cTab')">差评</span>
													<span class="tb-tbcr-num"><?php echo ($bad_num); ?></span>
												</div>
											</li>
										</ul>
									</div>
									<div class="clear"></div>
									
									<div id="cTab">
									<!-- 全部评价 -->
									<ul class="am-comments-list am-comments-list-flip">
									<?php if(is_array($comment)): foreach($comment as $key=>$vo): ?><li class="am-comment">
											<!-- 评论容器 -->
											<a href="">
												<img class="am-comment-avatar" src="<?php echo ($vo["header_img"]); ?>" />
												<!-- 评论者头像 -->
											</a>

											<div class="am-comment-main">
												<!-- 评论内容容器 -->
												<header class="am-comment-hd">
													<!--<h3 class="am-comment-title">评论标题</h3>-->
													<div class="am-comment-meta">
														<!-- 评论元数据 -->
														<a href="#link-to-user" class="am-comment-author"><?php echo ($vo["user_name"]); ?> (匿名)</a>
														<!-- 评论者 -->
														评论于
														<time datetime=""><?php echo (date("Y年m月d日 H:i",$vo["addtime"])); ?>
														<?php if($vo["comment_type"] == '好评'): ?><span style="display:block;float:right;color:green;"><?php echo ($vo["comment_type"]); ?></span>
														<?php elseif($vo["comment_type"] == '中评'): ?>
														<span style="display:block;float:right;color:blue;"><?php echo ($vo["comment_type"]); ?></span>
														<?php else: ?>
														<span style="display:block;float:right;color:red;"><?php echo ($vo["comment_type"]); ?></span><?php endif; ?>
														</time>
													</div>
												</header>

												<div class="am-comment-bd">
													<div class="tb-rev-item " data-id="255776406962">
														<div class="J_TbcRate_ReviewContent tb-tbcr-content ">
															<?php echo ($vo["comment"]); ?>
														</div>
														<div class="tb-r-act-bar">
															<?php echo ($vo["goods_type1"]); ?>：<?php echo ($vo["type1_name"]); ?>&nbsp;&nbsp;<?php echo ($vo["goods_type2"]); ?>：<?php echo ($vo["type2_name"]); ?>
														</div>
													</div>
													<div class="comment-pic">
													<?php if(is_array($vo["picture"])): foreach($vo["picture"] as $key=>$path): ?><img src='<?php echo ($path); ?>' onclick="viewImage(this.src)" style="cursor:pointer;" title="查看大图"/><?php endforeach; endif; ?>
													</div>
												</div>
												<!-- 评论内容 -->
											</div>
										</li><?php endforeach; endif; ?>
									</ul>
									<!-- 好评 -->
									<ul class="am-comments-list am-comments-list-flip to_hidden">
									<?php if(is_array($comment)): foreach($comment as $key=>$vo): if($vo["comment_type"] == '好评'): ?><li class="am-comment">
											<!-- 评论容器 -->
											<a href="">
												<img class="am-comment-avatar" src="<?php echo ($vo["header_img"]); ?>" />
												<!-- 评论者头像 -->
											</a>

											<div class="am-comment-main">
												<!-- 评论内容容器 -->
												<header class="am-comment-hd">
													<!--<h3 class="am-comment-title">评论标题</h3>-->
													<div class="am-comment-meta">
														<!-- 评论元数据 -->
														<a href="#link-to-user" class="am-comment-author"><?php echo ($vo["user_name"]); ?> (匿名)</a>
														<!-- 评论者 -->
														评论于
														<time datetime=""><?php echo (date("Y年m月d日 H:i",$vo["addtime"])); ?>
														<span style="display:block;float:right;color:green;"><?php echo ($vo["comment_type"]); ?></span>
														</time>
													</div>
												</header>

												<div class="am-comment-bd">
													<div class="tb-rev-item " data-id="255776406962">
														<div class="J_TbcRate_ReviewContent tb-tbcr-content ">
															<?php echo ($vo["comment"]); ?>
														</div>
														<div class="tb-r-act-bar">
															<?php echo ($vo["goods_type1"]); ?>：<?php echo ($vo["type1_name"]); ?>&nbsp;&nbsp;<?php echo ($vo["goods_type2"]); ?>：<?php echo ($vo["type2_name"]); ?>
														</div>
													</div>
													<div class="comment-pic">
													<?php if(is_array($vo["picture"])): foreach($vo["picture"] as $key=>$path): ?><img src='<?php echo ($path); ?>' onclick="viewImage(this.src)" style="cursor:pointer;" title="查看大图"/><?php endforeach; endif; ?>
													</div>
												</div>
												<!-- 评论内容 -->
											</div>
										</li><?php endif; endforeach; endif; ?>
									</ul>
									<!-- 中评 -->
									<ul class="am-comments-list am-comments-list-flip to_hidden" >
									<?php if(is_array($comment)): foreach($comment as $key=>$vo): if($vo["comment_type"] == '中评'): ?><li class="am-comment">
											<!-- 评论容器 -->
											<a href="">
												<img class="am-comment-avatar" src="<?php echo ($vo["header_img"]); ?>" />
												<!-- 评论者头像 -->
											</a>

											<div class="am-comment-main">
												<!-- 评论内容容器 -->
												<header class="am-comment-hd">
													<!--<h3 class="am-comment-title">评论标题</h3>-->
													<div class="am-comment-meta">
														<!-- 评论元数据 -->
														<a href="#link-to-user" class="am-comment-author"><?php echo ($vo["user_name"]); ?> (匿名)</a>
														<!-- 评论者 -->
														评论于
														<time datetime=""><?php echo (date("Y年m月d日 H:i",$vo["addtime"])); ?>
														<span style="display:block;float:right;color:blue;"><?php echo ($vo["comment_type"]); ?></span>
														</time>
													</div>
												</header>

												<div class="am-comment-bd">
													<div class="tb-rev-item " data-id="255776406962">
														<div class="J_TbcRate_ReviewContent tb-tbcr-content ">
															<?php echo ($vo["comment"]); ?>
														</div>
														<div class="tb-r-act-bar">
															<?php echo ($vo["goods_type1"]); ?>：<?php echo ($vo["type1_name"]); ?>&nbsp;&nbsp;<?php echo ($vo["goods_type2"]); ?>：<?php echo ($vo["type2_name"]); ?>
														</div>
													</div>
													<div class="comment-pic">
													<?php if(is_array($vo["picture"])): foreach($vo["picture"] as $key=>$path): ?><img src='<?php echo ($path); ?>' onclick="viewImage(this.src)" style="cursor:pointer;" title="查看大图"/><?php endforeach; endif; ?>
													</div>
												</div>
												<!-- 评论内容 -->
											</div>
										</li><?php endif; endforeach; endif; ?>
									</ul>

									<!-- 差评 -->
									<ul class="am-comments-list am-comments-list-flip to_hidden">
									<?php if(is_array($comment)): foreach($comment as $key=>$vo): if($vo["comment_type"] == '差评'): ?><li class="am-comment">
											<!-- 评论容器 -->
											<a href="">
												<img class="am-comment-avatar" src="<?php echo ($vo["header_img"]); ?>" />
												<!-- 评论者头像 -->
											</a>

											<div class="am-comment-main">
												<!-- 评论内容容器 -->
												<header class="am-comment-hd">
													<!--<h3 class="am-comment-title">评论标题</h3>-->
													<div class="am-comment-meta">
														<!-- 评论元数据 -->
														<a href="#link-to-user" class="am-comment-author"><?php echo ($vo["user_name"]); ?> (匿名)</a>
														<!-- 评论者 -->
														评论于
														<time datetime=""><?php echo (date("Y年m月d日 H:i",$vo["addtime"])); ?>
														<span style="display:block;float:right;color:red;"><?php echo ($vo["comment_type"]); ?></span>
														</time>
													</div>
												</header>

												<div class="am-comment-bd">
													<div class="tb-rev-item " data-id="255776406962">
														<div class="J_TbcRate_ReviewContent tb-tbcr-content ">
															<?php echo ($vo["comment"]); ?>
														</div>
														<div class="tb-r-act-bar">
															<?php echo ($vo["goods_type1"]); ?>：<?php echo ($vo["type1_name"]); ?>&nbsp;&nbsp;<?php echo ($vo["goods_type2"]); ?>：<?php echo ($vo["type2_name"]); ?>
														</div>
													</div>
													<div class="comment-pic">
													<?php if(is_array($vo["picture"])): foreach($vo["picture"] as $key=>$path): ?><img src='<?php echo ($path); ?>' onclick="viewImage(this.src)" style="cursor:pointer;" title="查看大图"/><?php endforeach; endif; ?>
													</div>
												</div>
												<!-- 评论内容 -->
											</div>
										</li><?php endif; endforeach; endif; ?>
									</ul>
									</div>
									<div class="clear"></div>

									<!--分页 -->
									<ul class="am-pagination am-pagination-right">
										<li class="am-disabled"><a href="#">&laquo;</a></li>
										<li class="am-active"><a href="#">1</a></li>
										<li><a href="#">2</a></li>
										<li><a href="#">3</a></li>
										<li><a href="#">4</a></li>
										<li><a href="#">5</a></li>
										<li><a href="#">&raquo;</a></li>
									</ul>
									<div class="clear"></div>

									<div class="tb-reviewsft">
										<div class="tb-rate-alert type-attention">购买前请查看该商品的 <a href="#" target="_blank">购物保障</a>，明确您的售后保障权益。</div>
									</div>

								</div>
								<script>
									/**
									 * 评价选项卡
									 */
									function showTab(obj,id){
										var arrayli=$(obj).parents("ul").find("li");	//获取在本对象中父节点的li数组
										var clickLi = $(obj).parents("li");	//当前点击的所在的li
										var arrayul=document.getElementById(id).getElementsByTagName('ul');	//获取在传入的class类中的ul数组
										
										//可知，需要根据指定的列表li来隐藏或者显示相应的tab，它们之间的关系一一对应即可
										for(var i=0;i<arrayli.length;i++){
											if(clickLi.html()==arrayli[i].innerHTML){
												arrayul[i].className='am-comments-list am-comments-list-flip';
											}else{
												arrayul[i].className='am-comments-list am-comments-list-flip to_hidden';
											}
										}
									}

									/**
									 * 预览图
									 */
									function viewImage( img_src ){   
									    if ( img_src == '' ) return;
									    JWin.lock.work();
									    JWin.win.work('预览图','<div style="text-align:center;padding:10px;"><img src="'+img_src+'" border="0" width="400px"/></div>',{'width':'500px','text-align':'center'},function(){
									        JWin.lock.hide(0);
									        JWin.win.hide(0);
									    });
									}

									function locate(){
										window.location.href="/home/pay/shopcart.html";
									}
								</script>

								<div class="am-tab-panel am-fade">
									<div class="like">
										<ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes">
											<li>
												<div class="i-pic limit">
													<img src="/Public/images/imgsearch1.jpg" />
													<p>【良品铺子_开口松子】零食坚果特产炒货
														<span>东北红松子奶油味</span></p>
													<p class="price fl">
														<b>¥</b>
														<strong>298.00</strong>
													</p>
												</div>
											</li>
											<li>
												<div class="i-pic limit">
													<img src="/Public/images/imgsearch1.jpg" />
													<p>【良品铺子_开口松子】零食坚果特产炒货
														<span>东北红松子奶油味</span></p>
													<p class="price fl">
														<b>¥</b>
														<strong>298.00</strong>
													</p>
												</div>
											</li>
											<li>
												<div class="i-pic limit">
													<img src="/Public/images/imgsearch1.jpg" />
													<p>【良品铺子_开口松子】零食坚果特产炒货
														<span>东北红松子奶油味</span></p>
													<p class="price fl">
														<b>¥</b>
														<strong>298.00</strong>
													</p>
												</div>
											</li>
											<li>
												<div class="i-pic limit">
													<img src="/Public/images/imgsearch1.jpg" />
													<p>【良品铺子_开口松子】零食坚果特产炒货
														<span>东北红松子奶油味</span></p>
													<p class="price fl">
														<b>¥</b>
														<strong>298.00</strong>
													</p>
												</div>
											</li>
											<li>
												<div class="i-pic limit">
													<img src="/Public/images/imgsearch1.jpg" />
													<p>【良品铺子_开口松子】零食坚果特产炒货
														<span>东北红松子奶油味</span></p>
													<p class="price fl">
														<b>¥</b>
														<strong>298.00</strong>
													</p>
												</div>
											</li>
											<li>
												<div class="i-pic limit">
													<img src="/Public/images/imgsearch1.jpg" />
													<p>【良品铺子_开口松子】零食坚果特产炒货
														<span>东北红松子奶油味</span></p>
													<p class="price fl">
														<b>¥</b>
														<strong>298.00</strong>
													</p>
												</div>
											</li>
											<li>
												<div class="i-pic limit">
													<img src="/Public/images/imgsearch1.jpg" />
													<p>【良品铺子_开口松子】零食坚果特产炒货
														<span>东北红松子奶油味</span></p>
													<p class="price fl">
														<b>¥</b>
														<strong>298.00</strong>
													</p>
												</div>
											</li>
											<li>
												<div class="i-pic limit">
													<img src="/Public/images/imgsearch1.jpg" />
													<p>【良品铺子_开口松子】零食坚果特产炒货
														<span>东北红松子奶油味</span></p>
													<p class="price fl">
														<b>¥</b>
														<strong>298.00</strong>
													</p>
												</div>
											</li>
											<li>
												<div class="i-pic limit">
													<img src="/Public/images/imgsearch1.jpg" />
													<p>【良品铺子_开口松子】零食坚果特产炒货
														<span>东北红松子奶油味</span></p>
													<p class="price fl">
														<b>¥</b>
														<strong>298.00</strong>
													</p>
												</div>
											</li>
											<li>
												<div class="i-pic limit">
													<img src="/Public/images/imgsearch1.jpg" />
													<p>【良品铺子_开口松子】零食坚果特产炒货
														<span>东北红松子奶油味</span></p>
													<p class="price fl">
														<b>¥</b>
														<strong>298.00</strong>
													</p>
												</div>
											</li>
											<li>
												<div class="i-pic limit">
													<img src="/Public/images/imgsearch1.jpg" />
													<p>【良品铺子_开口松子】零食坚果特产炒货
														<span>东北红松子奶油味</span></p>
													<p class="price fl">
														<b>¥</b>
														<strong>298.00</strong>
													</p>
												</div>
											</li>
											<li>
												<div class="i-pic limit">
													<img src="/Public/images/imgsearch1.jpg" />
													<p>【良品铺子_开口松子】零食坚果特产炒货
														<span>东北红松子奶油味</span></p>
													<p class="price fl">
														<b>¥</b>
														<strong>298.00</strong>
													</p>
												</div>
											</li>
										</ul>
									</div>
									<div class="clear"></div>

									<!--分页 -->
									<ul class="am-pagination am-pagination-right">
										<li class="am-disabled"><a href="#">&laquo;</a></li>
										<li class="am-active"><a href="#">1</a></li>
										<li><a href="#">2</a></li>
										<li><a href="#">3</a></li>
										<li><a href="#">4</a></li>
										<li><a href="#">5</a></li>
										<li><a href="#">&raquo;</a></li>
									</ul>
									<div class="clear"></div>

								</div>

							</div>

						</div>

						<div class="clear"></div>

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

				</div>
			</div>
			<!--菜单 -->
			<div class=tip>
				<div id="sidebar">
					<div id="wrap">
						<div id="prof" class="item">
							<a href="#">
								<span class="setting"></span>
							</a>
							<div class="ibar_login_box status_login">
								<div class="avatar_box">
									<p class="avatar_imgbox"><img src="/Public/images/no-img_mid_.jpg" /></p>
									<ul class="user_info">
										<li>用户名：sl1903</li>
										<li>级&nbsp;别：普通会员</li>
									</ul>
								</div>
								<div class="login_btnbox">
									<a href="#" class="login_order">我的订单</a>
									<a href="#" class="login_favorite">我的收藏</a>
								</div>
								<i class="icon_arrow_white"></i>
							</div>

						</div>
						<div id="shopCart" class="item" onclick="locate()">
							<a href="javascript:void(0);">
								<i id="end"></i><span class="message"></span>
							</a>
							<p>
								购物车
							</p>
							<?php if($different_goods != ''): ?><p class="cart_num"><?php echo ($different_goods); ?></p>
							<?php else: ?>
								<p class="cart_num">0</p><?php endif; ?>
							
						</div>
						<div id="asset" class="item">
							<a href="#">
								<span class="view"></span>
							</a>
							<div class="mp_tooltip">
								我的资产
								<i class="icon_arrow_right_black"></i>
							</div>
						</div>

						<div id="foot" class="item">
							<a href="#">
								<span class="zuji"></span>
							</a>
							<div class="mp_tooltip">
								我的足迹
								<i class="icon_arrow_right_black"></i>
							</div>
						</div>

						<div id="brand" class="item">
							<a href="#">
								<span class="wdsc"><img src="/Public/images/wdsc.png" /></span>
							</a>
							<div class="mp_tooltip">
								我的收藏
								<i class="icon_arrow_right_black"></i>
							</div>
						</div>

						<div id="broadcast" class="item">
							<a href="#">
								<span class="chongzhi"><img src="/Public/images/chongzhi.png" /></span>
							</a>
							<div class="mp_tooltip">
								我要充值
								<i class="icon_arrow_right_black"></i>
							</div>
						</div>

						<div class="quick_toggle">
							<li class="qtitem">
								<a href="#"><span class="kfzx"></span></a>
								<div class="mp_tooltip">客服中心<i class="icon_arrow_right_black"></i></div>
							</li>
							<!--二维码 -->
							<li class="qtitem">
								<a href="#none"><span class="mpbtn_qrcode"></span></a>
								<div class="mp_qrcode" style="display:none;"><img src="/Public/images/weixin_code_145.png" /><i class="icon_arrow_white"></i></div>
							</li>
							<li class="qtitem">
								<a href="#top" class="return_top"><span class="top"></span></a>
							</li>
						</div>
						<!--回到顶部 -->
						<div id="quick_links_pop" class="quick_links_pop hide"></div>

					</div>

				</div>
				<div id="prof-content" class="nav-content">
					<div class="nav-con-close">
						<i class="am-icon-angle-right am-icon-fw"></i>
					</div>
					<div>
						我
					</div>
				</div>
				<div id="shopCart-content" class="nav-content">
					<div class="nav-con-close">
						<i class="am-icon-angle-right am-icon-fw"></i>
					</div>
					<div>
						购物车
					</div>
				</div>
				<div id="asset-content" class="nav-content">
					<div class="nav-con-close">
						<i class="am-icon-angle-right am-icon-fw"></i>
					</div>
					<div>
						资产
					</div>

					<div class="ia-head-list">
						<a href="#" target="_blank" class="pl">
							<div class="num">0</div>
							<div class="text">优惠券</div>
						</a>
						<a href="#" target="_blank" class="pl">
							<div class="num">0</div>
							<div class="text">红包</div>
						</a>
						<a href="#" target="_blank" class="pl money">
							<div class="num">￥0</div>
							<div class="text">余额</div>
						</a>
					</div>

				</div>
				<div id="foot-content" class="nav-content">
					<div class="nav-con-close">
						<i class="am-icon-angle-right am-icon-fw"></i>
					</div>
					<div>
						足迹
					</div>
				</div>
				<div id="brand-content" class="nav-content">
					<div class="nav-con-close">
						<i class="am-icon-angle-right am-icon-fw"></i>
					</div>
					<div>
						收藏
					</div>
				</div>
				<div id="broadcast-content" class="nav-content">
					<div class="nav-con-close">
						<i class="am-icon-angle-right am-icon-fw"></i>
					</div>
					<div>
						充值
					</div>
				</div>
			</div>

	</body>

</html>