<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head lang="en">
		<meta charset="UTF-8">
		<title>注册</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp" />

		<link rel="stylesheet" href="/Public/AmazeUI-2.4.2/assets/css/amazeui.min.css" />
		<link href="/Public/css/dlstyle.css" rel="stylesheet" type="text/css">
		<script src="/Public/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/Public/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>

	</head>

	<body>

		<div class="login-boxtitle">
			<a href="/"><img alt="" src="/Public/images/logobig.png" /></a>
		</div>

		<div class="res-banner">
			<div class="res-main">
				<div class="login-banner-bg"><span></span><img src="/Public/images/big.jpg" /></div>
				<div class="login-box">

						<div class="am-tabs" id="doc-my-tabs">
							<ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify">
								<li class="am-active"><a href="">邮箱注册</a></li>
								<li><a href="">手机号注册</a></li>
							</ul>

							<div class="am-tabs-bd">
								<div class="am-tab-panel am-active">
									<form method="post" action="/index.php/Home/Register/register" id="email_register">
										
							   <div class="user-email">
										<label for="email"><i class="am-icon-envelope-o"></i></label>
										<input type="email" name="email" id="email" placeholder="请输入邮箱账号">
                 				</div>
                 				<div class="user-email">
										<label for="account"><i class="am-icon-user"></i></label>
										<input type="account" name="account" id="account" placeholder="请输入用户账号">
                 				</div>											
                 <div class="user-pass">
								    <label for="password"><i class="am-icon-lock"></i></label>
								    <input type="password" name="password" id="password" placeholder="设置密码">
                 </div>										
                 <div class="user-pass">
								    <label for="passwordRepeat"><i class="am-icon-lock"></i></label>
								    <input type="password" name="sure_password" id="passwordRepeat" placeholder="确认密码">
                 </div>	
                 
                 </form>
                 
								 <div class="login-links">
										<label for="reader-me">
											<input id="reader-me" type="checkbox" onclick="isaccepted()"> 点击表示您同意商城《服务协议》
										</label>
							  	</div>
										<div class="am-cf">
											<input type="button" name="" id="button" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl" onclick="sub()" disabled>
										</div>
										<div class="am-cf">
											<input type="button" id="to_login" value="登陆" class="am-btn am-btn-primary am-btn-sm am-fl" onclick="toLogin()">
										</div>

								</div>

								<div class="am-tab-panel">
									<form method="post">
                 <div class="user-phone">
								    <label for="phone"><i class="am-icon-mobile-phone am-icon-md"></i></label>
								    <input type="tel" name="" id="phone" placeholder="请输入手机号">
                 </div>																			
										<div class="verification">
											<label for="code"><i class="am-icon-code-fork"></i></label>
											<input type="tel" name="" id="code" placeholder="请输入验证码">
											<a class="btn" href="javascript:void(0);" onclick="sendMobileCode();" id="sendMobileCode">
												<span id="dyMobileButton">获取</span></a>
										</div>
                 <div class="user-pass">
								    <label for="password"><i class="am-icon-lock"></i></label>
								    <input type="password" name="" id="password" placeholder="设置密码">
                 </div>										
                 <div class="user-pass">
								    <label for="passwordRepeat"><i class="am-icon-lock"></i></label>
								    <input type="password" name="" id="passwordRepeat" placeholder="确认密码">
                 </div>	
									</form>
								 <div class="login-links">
										<label for="reader-me">
											<input id="reader-me" type="checkbox" > 点击表示您同意商城《服务协议》
										</label>
							  	</div>
										<div class="am-cf">
											<input type="button" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">
										</div>
								
									<hr>
								</div>

								<script>
									$(function() {
									    $('#doc-my-tabs').tabs();
									  })
								</script>

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
	var username = $("#account").val();
	var email = $("#email").val();

        if( username == " " ) return;
        //用户名判定,4-20个字符，中文、字母数字、下划线
        if( !username.match(/^[\u4e00-\u9fa5\w]{4,20}$/) ){
            alert('用户名须为4-20位汉字,_,字母或数字组成');
            return;
        }

        //邮箱判定
        var email = $("#email").val();
        if( !email.match( /\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/ ) ){
            alert('请输入正确的邮箱');
            return;
        }

        //ajax验证
        $.post(
            '/index.php/Home/Register/check',
            {"username":username,"email":email},
            function(data){
            	var obj = JSON.parse(data);	//获取控制器返回的ajax，里面包含邮箱和账户的存在状态
            	
                if (obj.email == 0 ){
                    alert("邮箱已注册！");
                    return;
                }else if(obj.account == 0){
                	alert("账号存在！");
                	return;
                }else{
                    document.getElementById('email_register').submit();   //触发表单提交事件
                }
            },
            'html'
        );
}
//注册按钮事件
function isaccepted(){  
    if(document.getElementById("reader-me").checked==true){  
        document.getElementById("button").disabled = false;  
    }else{  
        document.getElementById("button").disabled = true;  
    }  
}

//登陆按钮
function toLogin(){
	window.location.href="/home/login.html";
}
</script>
	</body>

</html>