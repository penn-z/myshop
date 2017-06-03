<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    /**
     * 登录界面
     */
    public function index(){
        session('is_login',null);   //进入登陆页面即注销登陆状态
        session('id',null); //注销用户id
        session('username',null); //注销账户名  
        session('temp_order',null);  //注销临时订单的状态
        $redirectURL = I('get.redirectURL');
        $this->assign("redirectURL",$redirectURL);
    	$this->display('login');
    }


    public function login(){

        $user = I('post.user');
        $table = M('user');
        //定义查询条件
        $condition['email'] = "{$user['str']}";
        $condition['account'] = "{$user['str']}";
        $condition['_logic'] = 'OR';
        $data = $table->where($condition)->find();

        if( $data != false){
            // 检测账户是否冻结状态，1为冻结
            if( $data['is_block'] == 1){
                echo '<script>alert("账户处于冻结状态，无法登录");window.location.href="/home/login.html";</script>';
            }
            if( $data['password'] == md5($user['password']) ){
                session('is_login',1);  //储存一个登陆状态session
                session('id',$data['id']);  //储存一个唯一id 
                session('username',$data['account']);   //储存用户账户名session
                $is_rem = I('post.is_rem'); //获取是否记住密码状态
                if( $is_rem == 'on' ){      //记住密码时
                    cookie('login_account',$user['str'],3600*24); // 指定账号cookie保存时间
                    cookie('login_password',$user['password'],3600*24); // 指定密码cookie保存时间
                    cookie('checked','checked',3600*24); // 指定密码的勾选cookie保存时间
                }else{      //不记住密码时
                    cookie('login_password',null);   //删除密码cookie
                    cookie('checked',null);
                }
                //利用redis存储单点登录状态
                S(array(
                    'type' => 'redis',
                    'host' => '127.0.0.1',
                    'port' => '6379',
                    'prefix' => 'user',
                    'expire' => '86400'
                    )
                );
                S('user_'.session('username'),session_id(),86400);
                $redirectURL = I('get.redirectURL');
                if($redirectURL == ''){ //被迫下线后，继续点击操作
                    $redirectURL = '/home';
                }else{
                    $redirectURL = htmlspecialchars_decode($redirectURL);   //把amp;转义为&，防止浏览器自动转义
                }
                redirect($redirectURL,1,"正在跳转中...");
            } 
            else{
                redirect('/home/login',2,'密码有误！正在跳回登陆页面...');
            } 
        }else{
            redirect('/home/login',2,'用户不存在！正在跳回登陆页面...');
        }
    }

    
}