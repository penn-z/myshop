<?php
namespace Home\Controller;
use Think\Controller;
class CheckLoginController extends Controller {
   public function _initialize(){
   		S(array(
   			'type' => 'memcache',
   			'host' => '127.0.0.1',
   			'port' => '11211',
   			'prefix' => 'admin',
   			'expire' => '600'
   			)
   		);
   		if( session("is_login") != 1 ){
            $redirectURL = $_SERVER['REDIRECT_URL'];  //先存储要操作的页面
   			redirect("/home/login.html?redirectURL={$redirectURL}",2,'你还未登陆，正在跳转至登陆页面...');
   		}

   		$ssid = session_id();
   		$getOldSSid = S('user_'.session('username'));	//获取已存在于memcache中的登录状态
   		if($ssid != $getOldSSid){		// 不匹对时,清除登录状态
   			session('username',null);
   			session('is_login',null);
   			session('id',null);
   			echo "<script>alert('账户已在别处登录,被迫下线');window.location.href='/home/login.html';</script>";
   			exit();
   		}
   }
}