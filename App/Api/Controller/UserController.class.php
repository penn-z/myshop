<?php
namespace Api\Controller;
use Think\Controller;
class UserController extends Controller {
	/**
	 * 封号、解封
	 */
	public function freezeUser(){
		$act = I("get.action");
		$user_id = I("get.id");
		if($act == 1){
			$ret = M("user")->where("id={$user_id}")->setField("is_block",1);	//is_block=1为冻结状态
			if( $ret == 1 ) echo 1;
			else echo false;
		}else{
			$ret = M("user")->where("id={$user_id}")->setField("is_block",0);	//is_block=0为解封状态
			if( $ret == 1 ) echo 1;
			else echo fasle;
		}
	}

	/**
	 * 后台修改密码
	 */
	public function changeCode(){
		$new_code = I("get.new_code");
		$id = I("get.id");
		$new_code = md5($new_code);	//md5加密
		$ret = M("user")->where("id={$id}")->setField("password",$new_code);
		if($ret===false) echo false;
		else echo 1;
	}

}
