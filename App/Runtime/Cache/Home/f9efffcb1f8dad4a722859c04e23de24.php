<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head lang="en">
		<meta charset="UTF-8">
		<title>登录</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp" />

		<link rel="stylesheet" href="/Public/AmazeUI-2.4.2/assets/css/amazeui.css" />
		<link href="/Public/css/dlstyle.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="/Public/js/jquery-1.7.2.min.js"></script>
	</head>

	<body>

		<div class="login-boxtitle">
			<a href="/"><img alt="logo" src="/Public/images/logobig.png" /></a>
		</div>

		<div class="login-banner">
			<div class="login-main">
				<div class="login-banner-bg"><span></span><img src="/Public/images/big.jpg" /></div>
				<div class="login-box">
					<h3 class="title">登录商城</h3>
					<div class="clear"></div>
						
					<div class="login-form">
				  		<form method="post" action="/index.php/Home/Login/login.html?redirectURL=<?php echo ($redirectURL); ?>" id="login_form">
							<div class="user-name">
							    <label for="user"><i class="am-icon-user"></i></label>
							    <input type="text" name="user[str]" id="user" placeholder="邮箱/手机/用户名" value="<?php echo (cookie('login_account')); ?>" />
	                 		</div>
					    	<div class="user-pass">
							    <label for="password"><i class="am-icon-lock"></i></label>
							    <input type="password" name="user[password]" id="password" placeholder="请输入密码" value="<?php echo (cookie('login_password')); ?>">
					        </div>
	              
	           		</div>
            
		            <div class="login-links">
		                <label for="remember-me">
		                	<input id="remember-me" type="checkbox" name="is_rem" <?php echo (cookie('checked')); ?> >记住密码
		                </label>
						<a href="#" class="am-fr">忘记密码</a>
						<a href="register.html" class="zcnext am-fr am-btn-default">注册</a>
						<br />
		            	</form>
		            </div>
					<div class="am-cf">
						<input type="button" name="" id="login" value="登 录" class="am-btn am-btn-primary am-btn-sm" onclick="sub()">
					</div>
					<div class="partner">		
							<h3>合作账号</h3>
						<div class="am-btn-group">
							<li><a href="#"><i class="am-icon-qq am-icon-sm"></i><span>QQ登录</span></a></li>
							<li><a href="#"><i class="am-icon-weibo am-icon-sm"></i><span>微博登录</span> </a></li>
							<li><a href="#"><i class="am-icon-weixin am-icon-sm"></i><span>微信登录</span> </a></li>
						</div>
					</div>	
				</div>
			</div>
		</div>
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
		
	
<script>
function sub(){
	document.getElementById('login_form').submit();
}


$(document).keydown(function(event){
	if(event.keyCode == 13){	//绑定回车
		$("#login").click();	//点击登陆按钮
	}
});

</script>
	</body>

</html>