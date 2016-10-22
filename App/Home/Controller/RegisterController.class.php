<?php
namespace Home\Controller;
use Think\Controller;
class RegisterController extends Controller {
    public function index(){
    	$this->display('register');
    }

    public function register(){
    	$Form = new \Home\Model\RegisterModel;	//调用相应数据库模型
    	if($Form->create()) {
            $result =   $Form->add();
            if($result) {
                $this->success('注册成功！');
            }else{
                $this->error('注册失败！');
            }
        }else{
            $this->error($Form->getError());
        }
    }

    public function check(){
    	$account = I('post.username');
    	$email = I('post.email');
    	$table = M('user');
    	
    	//检验email是否存在
    	$find_email = $table->where("email='".$email."'")->find();
    	if( $find_email ) $data['email'] = '0';
    	else $data['email'] = '1';

    	//检验账户是否存在
    	$find_account = $table->where("account='".$account."'")->find();
    	if( $find_account ) $data['account'] = '0';
    	else $data['account'] = '1';

    	$this->ajaxReturn($data);
    }	
}