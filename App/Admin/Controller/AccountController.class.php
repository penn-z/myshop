<?php
namespace Admin\Controller;
use Think\Controller;
class AccountController extends CheckLoginController {

    public function showList(){
    	$Form = M('admin');

    	$act = I('get.act');
    	if( $act == 'del' ){
    		$id = I('get.id');

    		$result = $Form->where("id='{$id}'")->delete();
    		$errno = null;
    		if( $result != false ){
				$errno = array('style'=>'success','str'=>'删除成功！');    			
    		}else{
    			$errno = array('style'=>'error','str'=>'删除失败！');
    		}
    		$this->assign('errno',$errno);
    	}

    	$count      = $Form->where('1=1')->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(5)
        $Page->rollPage = 5;    //显示的页码数
        unset($Page->parameter['act']);     //删除act动作，这样删除成功一次后就不会就带参数传递了
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $Form->where('1=1')->order('addtime')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出


    	$this->display('acount_list');
    }

    public function edit(){
    	$act = I('get.act');
    	$id = I('get.id');

    	if( $act == 'edit' ){
    		$model = M('user');
    		$data = $model->find($id);
    		$this->assign('data',$data);
    	}

    	if( $act == 'update' ){
    		$model = M('user');
    		$_data = I('post.user');

    		//当密码有被修改时，进行md5加密
    		if( $_data['password'] !=''){
    			$_data['password'] = md5($_data['password']);
    		}
    		$result = $model->where("id='{$id}'")->save($_data);

    		$errno = null;
    		if( $result != false){
                $errno = array('style'=>'success','str'=>'文章编辑成功！');
            }else{
                $errno = array('style'=>'error','str'=>'文章编辑失败！');
            }
            $this->assign('errno',$errno);
    	}

    	$this->display('member_edit');
    }

    public function add(){
        $act = I('post.act');
        if( $act == 'add' ){

            $Form = new \Admin\Model\AccountModel;
            // $Form = D('admin');
            if($Form->create()) {
                $Form->password = md5($Form->password);
                $errno = null;
                $result =   $Form->add();
                if( $result ) $errno = array('style'=>'success','str'=>'管理员添加成功！');
                else $errno = array('style'=>'error','str'=>'管理员添加失败！');
                $this->assign('errno',$errno);
            }else{
                $this->error($Form->getError());
            }
        }
            
        $this->display('acount_add');
    }

}
