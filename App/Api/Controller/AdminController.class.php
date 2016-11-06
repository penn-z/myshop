<?php
namespace Api\Controller;
use Think\Controller;
class AdminController extends Controller {
    /**
     * 验证超级管理员密码
     */
    public function validateCode(){
    	$code = I("get.code");
    	$super_code = M("admin")->where("power=1")->getField("password");
    	if(md5($code)==$super_code){
    		echo 1;
    	}else{
    		echo 0;
    	}
    }

    /**
     *冻结、解封、删除管理员
     */
    public function operate(){
    	$act = I("get.act");
    	$id = I("get.id");
    	//冻结
    	if($act=='block'){
    		$ret = M("admin")->where("id={$id}")->setField("is_block",1);
    		if($ret===false) echo 0;	//冻结失败
    		else echo 1;	//冻结成功
    	}else if($act=='unblock'){	//解封
    		$ret = M("admin")->where("id={$id}")->setField("is_block",0);
    		if($ret===false) echo 0;	//解封失败
    		else echo 1;	//解封成功
    	}else{
    		$ret = M("admin")->where("id={$id}")->delete();	//删除
    		if($ret!=false) echo 1; //删除成功
    		else echo 0;	//删除失败
    	}
    }

    /**
     * 修改管理员密码
     */
    public function changeCode(){
    	$old_code = I("get.old_code");
    	$new_code = I("get.new_code");
    	$id = I("get.id");
    	$code = M("admin")->where("id={$id}")->getField("password");
    	if( md5($old_code) == $code ){
    		$new_code = md5($new_code);
    		$ret = M("admin")->where("id={$id}")->setField("password",$new_code);
    		if($ret===false) echo 0;	//修改失败
    		else echo 1;	//修改成功
    	}else{
    		echo 2;	//原密码错误
    	}
    }
}