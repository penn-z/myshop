<?php
namespace Home\Controller;
use Think\Controller;
class CheckLoginController extends Controller {
   public function _initialize(){
   		if( session("is_login") != 1 ){
   			redirect('/home/login',3,'你还未登陆，正在跳转至登陆页面...');
   		}
   }
}