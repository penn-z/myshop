<?php
namespace Admin\Controller;
use Think\Controller;
class CheckLoginController extends Controller {
    
    public function _initialize(){
        // 设置缓存方式
        S(array(
            'type'=>'redis',
            'host'=>'127.0.0.1',
            'port'=>'6379',
            'prefix'=>'admin',
            'expire'=>600)   //缓存时间
        );
        if( !session('?UID') || session('UID') == ''
            || !session('?UACCOUNT') || session('UACCOUNT') == ''
            || !session('?UNAME') || session('UNAME') == ''
        )
        {
            // redirect('/admin/login',3,'你未登陆,正在跳转至登陆......');
            echo "<script>window.top.location.href='/admin/login';</script>";
        }

        $ssid = session_id();   //此时的session
        $getSSid = S("admin_".session("UACCOUNT"));    //获取存在缓存中的登录session

        //此时的session与缓存中的session不一致时
        if( $ssid != $getSSid ){
            session('admin',null);
            echo "<script>alert('账户已在别处登录,被迫下线');window.top.location.href='/admin/login';</script>";
        }
    }
}