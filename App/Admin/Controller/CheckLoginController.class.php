<?php
namespace Admin\Controller;
use Think\Controller;
class CheckLoginController extends Controller {
    
    public function _initialize(){
        if( !session('?UID') || session('UID') == ''
            || !session('?UACCOUNT') || session('UACCOUNT') == ''
            || !session('?UNAME') || session('UNAME') == ''
        )
        {
            // redirect('/admin/login',3,'你未登陆,正在跳转至登陆......');
            echo "<script>window.top.location.href='/admin/login';</script>";
        }

    }

}