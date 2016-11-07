<?php
namespace Home\Controller;
use Think\Controller;
class WechatController extends Controller {
    public function index(){
    	$appID = 'wxb68a465ac0e773b9';
		$appsecret = '4d2c05cf29aa92409a45e330d2dc53c5';
		$redirect_uri = 'http://wx.faquwen.com/auth.php?';
		$redirect_uri = urlencode($redirect_uri);
		$state = "192.168.1.69/home/wechat/callback";
		$state = urlencode($state);	//此处的url需要加密，url才能解析
		$test = "https://open.weixin.qq.com/connect/oauth2/authorize?appid={$appID}&redirect_uri={$redirect_uri}&response_type=code&scope=snsapi_userinfo&state=$state#wechat_redirect";
    	echo "<a href='$test'>微信登录</a>";
    }

    public function callback(){
    	/*先判断是否储存了微信用户id*/
    	if( isset($_SESSION['uid']) ){	//已存在，直接跳向商城
    		$uid = $_SESSION['uid'];
			header();	//定向去商城
    	}
    	$code = $_GET['code'];
    	$appID = 'wxb68a465ac0e773b9';
		$appsecret = '4d2c05cf29aa92409a45e330d2dc53c5';
		$token_url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$appID.'&secret='.$appsecret.'&code='.$code.'&grant_type=authorization_code';

		$curl = curl_init( );  
		curl_setopt( $curl, CURLOPT_URL, $token_url );  
		curl_setopt( $curl, CURLOPT_HTTPGET, true );  
		curl_setopt( $curl, CURLOPT_HEADER, false );  
		curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );  
		curl_setopt( $curl, CURLOPT_USERAGENT, $userAgent );  
		curl_setopt( $curl, CURLOPT_TIMEOUT, 30 );  
		curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, false );  
		$ret = curl_exec( $curl );  

		$json = json_decode($ret);
		// var_dump($json);
		if ( $json == NULL ) 			exit(0);
		if ( isset($json->errcode) )	exit(1);



		$access_token = $json->access_token;
		$openid = $json->openid;
		$lang ='zh_CN';
    	$info_url = 'https://api.weixin.qq.com/sns/userinfo?access_token='.$access_token.'&openid='.$openid.'&lang='.$lang;

		$curl = curl_init( );  
		curl_setopt( $curl, CURLOPT_URL, $info_url );  
		curl_setopt( $curl, CURLOPT_HTTPGET, true );  
		curl_setopt( $curl, CURLOPT_HEADER, false );  
		curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );  
		curl_setopt( $curl, CURLOPT_USERAGENT, $userAgent );  
		curl_setopt( $curl, CURLOPT_TIMEOUT, 30 );  
		curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, false );  
		$ret = curl_exec( $curl );  

		$json = json_decode($ret);

		if ( $json == NULL ) 			exit(0);
		if ( isset($json->errcode) )	exit(1);

		/**
		 * 获取用户信息成功
		 * 1.判断用户是否存在（查询数据库，以openid为条件）
		 * 2.若不存在，注册用户，把获取到的微信用户信息存入数据库
		 * 3.存储登录session
		 */
		if( isset($_SESSION['']) ){
			//已登陆
		}
    }
}


