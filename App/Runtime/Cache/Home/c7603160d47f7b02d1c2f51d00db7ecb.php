<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>搜索页面</title>

		<link href="/Public/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="/Public/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />
		<link href="/Public/basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link href="/Public/css/seastyle.css" rel="stylesheet" type="text/css" />
		<!-- <link href="/Public/css/page.css" rel="stylesheet" type="text/css"/> -->

		<script type="text/javascript" src="/Public/basic/js/jquery-1.7.min.js"></script>
		<script type="text/javascript" src="/Public/js/script.js"></script>
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
							<a href="/home/login.html?redirectURL=<?php echo ($redirectURL); ?>" target="_top" class="h">亲，请<span style="color:blue">登录<span></a>
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
					<div class="menu-hd"><a id="mc-menu-hd" href="/home/pay/shopcart.html?redirectURL=<?php echo (urlencode($redirectURL)); ?>" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h" style="color:orange;"></strong></a></div>
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
           <div class="search">
			<div class="search-list">
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
			
				
					<div class="am-g am-g-fixed">
						<div class="am-u-sm-12 am-u-md-12">
	                  	<div class="theme-popover">														
							<!-- <div class="searchAbout">
								<span class="font-pale">相关搜索：</span>
								<a title="坚果" href="#">坚果</a>
								<a title="瓜子" href="#">瓜子</a>
								<a title="鸡腿" href="#">豆干</a>

							</div> -->
							<ul class="select">
								<p class="title font-normal">
									<span class="fl"><a style="color:red;">
									<!-- 
										先抓取关键词key_word,如果没有sec_cat搜索词时，则显示key_word，否则显示sec_cat。
									 -->
									<?php $key_word = $_GET['key_word'] ?>
									<?php echo ((isset($_GET['sec_cat']) && ($_GET['sec_cat'] !== ""))?($_GET['sec_cat']):"$key_word"); ?></a></span>
									<span class="total fl">搜索到<strong class="num"><?php echo ($goods_num); ?></strong>件相关商品</span>
								</p>
								<div class="clear"></div>
								<li class="select-result">
									<dl>
										<dt>已选</dt>
										<dd class="select-no"></dd>
										<p class="eliminateCriteria">清除</p>
									</dl>
								</li>
								<div class="clear"></div>
								<li class="select-list">
									<dl id="select1">
										<dt class="am-badge am-round">品牌</dt>	
									
										 <div class="dd-conent">										
											<dd class="select-all selected"><a href="#">全部</a></dd>
											<?php if(is_array($brand)): foreach($brand as $key=>$vo): ?><dd><a href="javascript:void(0)"><?php echo ($vo); ?></a></dd><?php endforeach; endif; ?>
										 </div>
						
									</dl>
								</li>
								<li class="select-list">
									<dl id="select2">
										<dt class="am-badge am-round">种类</dt>
										<div class="dd-conent">
											<dd class="select-all selected"><a href="#">全部</a></dd>
											<?php if(is_array($category)): foreach($category as $key=>$vo): ?><dd><a href="javascript:void(0)" ><i category_id="<?php echo ($category_id["$key"]); ?>"><?php echo ($vo); ?></i></a></dd><?php endforeach; endif; ?>
										</div>
									</dl>
								</li>
								<li class="select-list">
									<dl id="select3">
										<dt class="am-badge am-round">选购热点</dt>
										<div class="dd-conent">
											<dd class="select-all selected"><a href="#">全部</a></dd>
											<?php if(is_array($hot_spot)): foreach($hot_spot as $key=>$vo): ?><dd><a href="javascript:void(0);"><?php echo ($vo); ?></a></dd><?php endforeach; endif; ?>
										</div>
									</dl>
								</li>
					        
							</ul>
							<div class="clear"></div>
                        </div>
							<div class="search-content">
								<div class="sort">
								<?php if(isset($_GET['sec_cat'])) $extra="sec_cat=".$_GET['sec_cat']."&"; ?>
									<?php switch($order): case "price_desc": ?><li class="first"><a href="/home/search.html?order=common&<?php echo ($extra); ?>key_word=<?php echo ($_GET['key_word']); ?>" title="综合">综合排序</a></li>
										<li><a title="销量" href="/home/search.html?order=sales&<?php echo ($extra); ?>key_word=<?php echo ($_GET['key_word']); ?>" order="sales">销量从高到低</a></li>
										<li><a title="价格" href="/home/search.html?order=price_asc&<?php echo ($extra); ?>key_word=<?php echo ($_GET['key_word']); ?>">价格优先&nbsp;&darr;</a></li>
										<li class="big"><a title="评价" href="/home/search.html?order=comment&<?php echo ($extra); ?>key_word=<?php echo ($_GET['key_word']); ?>">评价为主</a></li><?php break;?>
									<?php case "price_asc": ?><li class="first"><a href="/home/search.html?order=common&<?php echo ($extra); ?>key_word=<?php echo ($_GET['key_word']); ?>" title="综合">综合排序</a></li>
										<li><a title="销量" href="/home/search.html?order=sales&<?php echo ($extra); ?>key_word=<?php echo ($_GET['key_word']); ?>" order="sales">销量从高到低</a></li>
										<li><a title="价格" href="/home/search.html?order=price_desc&<?php echo ($extra); ?>key_word=<?php echo ($_GET['key_word']); ?>">价格优先&nbsp;&uarr;</a></li>
										<li class="big"><a title="评价" href="/home/search.html?order=comment&<?php echo ($extra); ?>key_word=<?php echo ($_GET['key_word']); ?>">评价为主</a></li><?php break;?>
									<?php default: ?>
										<li class="first"><a href="/home/search.html?order=common&<?php echo ($extra); ?>key_word=<?php echo ($_GET['key_word']); ?>" title="综合">综合排序</a></li>
										<li><a title="销量" href="/home/search.html?order=sales&<?php echo ($extra); ?>key_word=<?php echo ($_GET['key_word']); ?>" order="sales">销量从高到低</a></li>
										<li><a title="价格" href="/home/search.html?order=price_asc&<?php echo ($extra); ?>key_word=<?php echo ($_GET['key_word']); ?>">价格优先</a></li>
										<li class="big"><a title="评价" href="/home/search.html?order=comment&<?php echo ($extra); ?>key_word=<?php echo ($_GET['key_word']); ?>">评价为主</a></li><?php endswitch;?>
								</div>
								<div class="clear"></div>
								
								<ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes">
								<?php if(($error) == "1"): ?><li>
										<div class="i-pic limit">
											<img src="/Public/images/notfound.gif"/>
											<p class="title fl"></p>
											<p class="price fl">
												<b>¥</b>
												<strong>0</strong>
											</p>
											<p class="number fl">
												销量<span>0</span>
											</p>
										</div>
									</li>
								<?php else: ?>
								<?php if(is_array($goods_info)): foreach($goods_info as $key=>$goods): ?><li>
										<div class="i-pic limit">
										<a href="/home/introduction.html?id=<?php echo ($goods["goods_id"]); ?>">
											<input type="hidden" value="<?php echo ($goods["rel_info"]); ?>"/>
											<img src="<?php echo ($goods["thumb"]); ?>" />
											<p class="title fl"><?php echo ($goods["goods_name"]); ?></p>
											<p class="price fl">
												<b>¥</b>
												<strong><?php echo ($goods["goods_discount"]); ?></strong>
											</p>
											<p class="number fl">
												销量<span><?php echo ($goods["cumulative_sales"]); ?></span>
											</p>
										</a>
										</div>
									</li><?php endforeach; endif; endif; ?>
								</ul>
							</div>
							<script>

							</script>
							<div class="search-side">

								<div class="side-title">
									经典搭配
								</div>

								<li>
									<div class="i-pic check">
										<img src="/Public/images/cp.jpg" />
										<p class="check-title">萨拉米 1+1小鸡腿</p>
										<p class="price fl">
											<b>¥</b>
											<strong>29.90</strong>
										</p>
										<p class="number fl">
											销量<span>1110</span>
										</p>
									</div>
								</li>
								<li>
									<div class="i-pic check">
										<img src="/Public/images/cp2.jpg" />
										<p class="check-title">ZEK 原味海苔</p>
										<p class="price fl">
											<b>¥</b>
											<strong>8.90</strong>
										</p>
										<p class="number fl">
											销量<span>1110</span>
										</p>
									</div>
								</li>
								<li>
									<div class="i-pic check">
										<img src="/Public/images/cp.jpg" />
										<p class="check-title">萨拉米 1+1小鸡腿</p>
										<p class="price fl">
											<b>¥</b>
											<strong>29.90</strong>
										</p>
										<p class="number fl">
											销量<span>1110</span>
										</p>
									</div>
								</li>

							</div>
							<div class="clear"></div>
							<!--分页 -->
							<ul class="am-pagination am-pagination-right">
								<?php echo ($page); ?>
								
								<!-- <li class="am-disabled"><a href="#">&laquo;</a></li>
								<li class="am-active"><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">5</a></li>
								<li><a href="#">&raquo;</a></li> -->
							</ul>
						</div>
						<script>
							var div = $(".am-pagination").find("div");
							div.parent().append( div.children() );
							div.remove();
							
							var p = '<?php echo ($_GET['p']); ?>';	//当前页码
							$(".am-pagination").children().each(function(){
								if( $(this).text() == p ){
									$(this).wrap("<li class='am-active'></li>");
								}else{
									$(this).wrap("<li></li>");
								}
							});
						</script>
					</div>
					<!--底部-->
							<div class="footer">
			<div class="footer-hd">
				<p>
					<a href="#">Penn</a>
					<b>|</b>
					<a href="/home">首页</a>
					<b>|</b>
					<a href="/home/Person">个人中心</a>
					<b>|</b>
					<a href="#">物流</a>
				</p>
			</div>
			<div class="footer-bd">
				<p>
					<a href="#">关于Penn</a>
					<a href="#">合作伙伴</a>
					<a href="#">联系我</a>
					<a href="#">网站地图</a>
					<em>© 2015-2025 Penn.cn 版权所有</em>
				</p>
			</div>
		</div>
		
	
					<!-- 底部 -->
				</div>

			</div>

		<!--引导 -->
		<div class="navCir">
			<li><a href="home2.html"><i class="am-icon-home "></i>首页</a></li>
			<li><a href="sort.html"><i class="am-icon-list"></i>分类</a></li>
			<li><a href="shopcart.html"><i class="am-icon-shopping-basket"></i>购物车</a></li>	
			<li><a href="/Public/person/index.html"><i class="am-icon-user"></i>我的</a></li>					
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
		<!--菜单 -->
		<script>
			window.jQuery || document.write('<script src="basic/js/jquery-1.9.min.js"><\/script>');
			function locate(){
				window.location.href="/home/pay/shopcart.html?redirectURL=<?php echo (urlencode($redirectURL)); ?>";
			}
		</script>
		<script type="text/javascript" src="/Public/basic/js/quick_links.js"></script>

<div class="theme-popover-mask"></div>

	</body>

</html>