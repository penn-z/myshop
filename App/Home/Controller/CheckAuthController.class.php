<?php
namespace Home\Controller;
use Think\Controller;
class CheckAuthController extends Controller{
	/**
	 * 初始化方法
	 */
	public function _initialize(){
		S(array(
			'type' => 'redis',
   			'host' => '127.0.0.1',
   			'port' => '6379',
   			'prefix' => 'user',
   			'expire' => '3600'
   			)
		);
		$ssid = session_id();
		$getOldSSid = S('user_'.session('username'));
		if($ssid != $getOldSSid){	//当登录状态与缓存中不一致时,证明他处登录
			//清除当前登录状态
			session('username',null);
			session('is_login',null);
			session('id',null);
		}
	}
}