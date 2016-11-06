<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta charset="utf-8" />    
    <title>后台登陆系统</title>	
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/sendCloudFront.css"> 
</head>
<body>
    <div class="scr-header">
        <a class="logo"></a>
    </div>
    <div class="scr-body">
        <div class="scr-wrapper">
            <div class="scr-wrapper-top">
                <div class="scr-wrapper-inner">
                    <div class="msg error" id="error" style="display:block;padding: 10px 0px;overflow: hidden;"></div>                    
                     
                    <!-- <div class="msg error">您的账户尚未激活，<br />请检查您的邮箱点击邮件中链接激活账户！ </div> -->
                    <form id="login-form" method="post" autocomplete="off">
                        <ul class="scr-log-form-list">
                            <li class="scr-form-item">
                                <label for="username" class="prefix">账户</label>
                                <input id="username" class="ipt" name="user" type="text" placeholder="用户名/邮箱" />
                            </li>
                            <li class="scr-form-item">
                                <label for="password" class="prefix">密码</label>
                                <input id="password" class="pwd" name="pass" type="password" />
                                <!--
                                <input id="remember" class="remPwd" name="remember" value="true" type="checkbox" /><label for="remember" class="remPwdLabel">记住密码</label>
                                -->
                            </li>
                            <li class="scr-form-item" style="display:none">
                                <label for="username" class="prefix">口令</label>
                                <input id="code" class="ipt" name="code" type="text" placeholder="口令" />
                            </li>
                            <li class="scr-log-item">
                                <a id="login" class="log-btn" href="javascript:do_submit();"></a>
                                <span class="log-ing-btn"></span>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
        <!--
        <div class="scr-advice">
            <p>忘记密码？请点击<a href="#" target="_blank">找回密码</a></p>
            <p>没有账号？请点击<a href="#" target="_blank">注册</a></p>
        </div>
        -->
    </div> 
    
</body>
<script language="javascript" src="/Public/Admin/js/jquery.min.js"></script>
<!-- <script type="text/javascript" src="/static/admin/js/JWin.js"></script> -->
<script type="text/javascript">
//tip class
var tip = function()
{
    var o = {};
    o.res   = null;
    o.style = {
        'err'   : {'background':'#A50100'},
        'info'  : {'background':'#000'},
        'ok'    : {'background':'#8FD71C'}
    }

    o.show  = function(str, type, duration)
    {
        if ( this.res != null ) 
        {
            clearTimeout(this.res);
            this.res = null;
        }
        $('#error').css(this.style[type]);
        $('#error').html(str);
        var that = this;
        $('#error').fadeIn(500, function(){
            if ( duration == -1 ) return;
            //take the timeout resource
            that.res = setTimeout(function(){
                $('#error').fadeOut(500);
            }, duration);       
        });
    }

    return o;
}();
$('input').each(function(i, ele){
    $(this).bind('keydown', function(e){
        if ( e.which == 13 ) do_submit();
    });
})

var uname = document.getElementById('username');
var upass = document.getElementById('password');

//focus the user name input
uname.focus();
// JWin.center('err-box');
$('#error').css({top:'20px'});


//form submit
function do_submit()
{
    if ( uname.value.trim() == '' )
    {
        tip.show('Enter your username please!', 'info', 2000);
        uname.focus();
        return;
    }

    if ( upass.value.trim() == '' )
    {
        tip.show('Enter your password please!', 'info', 2000);
        upass.focus();
        return;
    }
    
  
    
    if ( upass.value.trim().length < 6 )
    {
        tip.show('Make sure your password is longer than 6 chars!', 'err', 2000);
        upass.focus();
        return;
    }


    tip.show('Signing, please wait...', 'info', -1);
    $.post('/admin/login/check', {
        user:uname.value.trim(),
        pass:upass.value.trim()
	},function(ret){
        
        
        if ( ret == 0 )
        {
            
			tip.show('用户名和密码不匹配!', 'err', -1);
			return;
				
        }else if( ret == 1 ){
			tip.show('Welcome, redirecting...', 'ok', -1);
			setTimeout(function(){
            window.location.href = '/admin/admin';
			}, 1500);
		}else if( ret == 2 ){
            tip.show('用户不存在!','err',-1);
            return;
        }else{
            tip.show('用户已经被冻结,无法登录！','err',-1);
        }
    });
}

</script>
</html>