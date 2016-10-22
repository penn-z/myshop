<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    
    public function index(){
        session(null);  //只要进入登陆界面，便清除登陆状态
        $this->display('auth');
    }

    public function check(){
        $user = I('post.user');
        $pwd = I('post.pass');

        $Form = M('admin');

        $data = $Form->where("account='{$user}'")->find();  //从数据库中取相应账户对比
        if( $data == true ){
            $pwd = md5($pwd);
            if( $data['password'] == $pwd ){
                // $_SESSION = array();
                session('UID',$data['id']);
                session('UACCOUNT',$data['account']);
                session('UNAME',$data['name']);
                session('LOGINTIME',time());
                echo '1';  
            } 
            else{
                echo '0';  
            } 
        }else{
            echo '2';
        }
    }

   
}