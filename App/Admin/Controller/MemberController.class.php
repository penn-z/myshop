<?php
namespace Admin\Controller;
use Think\Controller;
class MemberController extends CheckLoginController {

    public function showList(){
    	$Form = M('user');

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

    	$count = $Form->where('1=1')->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(5)
        $Page->rollPage = 5;    //显示的页码数
        unset($Page->parameter['act']);     //删除act动作，这样删除成功一次后就不会就带参数传递了
		$show = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $Form->where('1=1')->order('addtime')->limit($Page->firstRow.','.$Page->listRows)->select();

		
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出


    	$this->display('member_list');
    }

    /**
     * 编辑会员
     */
    public function edit(){
        $id = I("get.id");
        if( I("get.act") == 'update' ){
            $data = I("post.user");
            //判断是否有修改头像
            if( $_FILES['header_img']['name'] != "" ){
                $config = array(
                    'maxSize'    =>    3145728, //上传大小最大值3MB
                    'rootPath'   =>    'Public/Uploads/Images/Person/',
                    'savePath'   =>    'id'.$id.'/',
                    'saveName'   =>    array('uniqid',''),
                    'exts'       =>    array('jpg', 'gif', 'png', 'jpeg','bmp'),
                    'autoSub'    =>    false,
                );
                $upload = new \Think\Upload($config);// 实例化上传类
                $info   =   $upload->uploadOne($_FILES['header_img']);  //单文件上传要写$_FILES[]里面的属性

                if( !$info ){
                    $this->error($upload->getError());
                }else{
                    
                    $image = new \Think\Image();    //实例化图像处理对象

                    $img_path = "./Public/Uploads/Images/Person/".$info['savepath'].$info['savename'];

                    $image->open($img_path);
                    // 按照原图的比例生成一个最大为150*150的缩略图
                    $new_img = "./Public/Uploads/Images/Person/".$info['savepath'].$info['savename'];
                    $result = $image->thumb(100,100,\Think\Image::IMAGE_THUMB_FIXED)->save($new_img);

                    if( $result != false ){

                        //缩略图生成成功后，更改头像新地址
                        $data['header_img'] = "/Public/Uploads/Images/Person/".$info['savepath'].$info['savename'];
                        $old = "/var/www/shop".I('post.old');   //原来头像图片文件路径名
                        unlink($old);       //删除原来头像图片
                    }
                }
            }

            $ret = M("user")->where("id={$id}")->save($data);   //更新数据
            $errno = false;
            if($ret===false ) $errno = array('str'=>'修改失败！','style'=>'error');
            else $errno =array('str'=>'修改成功！','style'=>'success');
            $this->assign("errno",$errno);
        }

        $user_info = M("user")->where("id={$id}")->find();
        $this->assign("user_info",$user_info);
        $this->display('member_edit');
    }
}