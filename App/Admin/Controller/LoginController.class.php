<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    
    public function index(){
        //只要进入登陆界面，便清除登陆状态
        session('UID',null);  
        session('UACCOUNT',null);
        session('UNAME',null);
        session('LOGINTIME',null);
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
                $status = $Form->where("account='{$user}'")->getField("is_block");
                if($status==1){
                    echo '3';   //账户被冻结状态
                }
                session('UID',$data['id']);
                session('UACCOUNT',$data['account']);
                session('UNAME',$data['name']);
                session('LOGINTIME',time());
                // 设置缓存初始化
                S(array(
                    'type'=>'redis',
                    'host'=>'127.0.0.1',
                    'port'=>'6379',
                    'prefix'=>'admin',
                    'expire'=>600)   //缓存时间
                );
                // 缓存登陆状态,以admin+UACCOUNT => session_id()的形式
                $ssid = session_id();   //获取当前session_id
                S("admin_".session('UACCOUNT'),$ssid,600);  //设置缓存

                echo '1';   //登陆成功
            } 
            else{
                echo '0';   //密码不正确
            } 
        }else{
            echo '2';   //账号不存在
        }
    }

   
}