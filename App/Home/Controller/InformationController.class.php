<?php
namespace Home\Controller;
use Think\Controller;
class InformationController extends CheckLoginController {
	/**
	 * 个人信息修改
	 */
    public function information(){

        $id = session('id');
        $table = M('user');
        $data = $table->where("id={$id}")->find();
        $this->assign('data',$data);  //注入个人资料信息进模板

        if( I('post.act') == 'edit' ){
            $data = I('post.user');     //此处很重要，必须先获取post过来的user信息
            //判断是否有修改头像
            if( $_FILES['header_img']['name'] != "" ){
                $config = array(
                    'maxSize'    =>    3145728, //上传大小最大值3MB
                    'rootPath'   =>    'Public/Uploads/Images/Person/',
                    'savePath'   =>    'id'.session('id').'/',
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

           
            $data['birth'] = strtotime($data['birth']); //根据日期格式生成时间戳
            $insert = $table->where("id={$id}")->save($data);  //更新数据

            if( $insert ){
                redirect('/home/information/information',1,'资料保存成功,正在跳转...');
            }else{
                redirect('/home/information/information',1,'您没有修改资料,正在跳转...');
            }
        }

        $this->display('/Person/information');
    }

    public function safety(){
        $id = session('id');
        $table = M('user');
        $data = $table->where("id={$id}")->getField('header_img');  //取头像地址注入模板
        $this->assign('data',$data);
        $this->display('/Person/safety');
    }

    /**
     * 密码修改，页面显示
     * @return session('string') success:修改成功 false:修改失败
     */
    public function password(){
       
        if(IS_POST){
            $id = session('id');
            $old = I('post.old_word');
            $new = I('post.new_word');
            $table = M('user');
            $data = $table->where("id={$id}")->find();

            if( $data['password'] == md5($old) ){
                $data['password'] = md5($new);
                $update = $table->where("id={$id}")->save($data);
                if( $update ) echo '1';        //修改成功
                else echo '0';                 //修改失败
            }else{
                echo '2';   //原密码输入错误
            }
        }else{
            $this->display('/Person/password');
        }
            
            
    }

    /**
     * 展示安全页面、保存安全问题
     */
    public function question(){
        if( IS_POST ){
            $user_id = session('id');
            $data['answer_1'] = I('post.answer_1');
            $data['answer_2'] = I('post.answer_2');
            $data['question_1'] = I('question_1');
            $data['question_2'] = I('question_2');
            $data['user_id'] = $user_id;
            $data['addtime'] = time();
            $table = M('question');
            $insert = $table->where("id={$id}")->add($data);
            if( $insert ) echo '1';
            else echo '0';
        }else{
            $this->display('/Person/question');
        }
    }

    

    /**
     * 添加、删除地址及展示地址列表
     */
    public function address(){
        $table =  M('address');
        //检测是否有删除动作
        if( I('get.iact') == 'del' ){
            $address_id = I('get.id');
            $del = $table->delete($address_id);
            if($del){
                echo "<script>alert('地址删除成功~~');</script>";
            }else{
                echo "<script>alert('删除失败~~');</script>";
            }
        }

        if( !I('post.act') ){

            $id = session('id');
            // $table = M('address');
            $data = $table->order('is_default desc')->where("user_id='{$id}'")->select();
            if( $data ){
                $this->assign('data',$data);
            }
            $this->display('/Person/address');
        }else if( I('post.act') == 'add' ){
            $receive = I('post.receive');
            if( $receive != "" ){
                // $table =  M('address');
                $receive['addtime'] = time();
                $receive['user_id'] = session('id');    //关联当前账户的id
                $insert = $table->add($receive);
                if( $insert ){
                  $this->success('添加地址成功','/home/information/address');
                }else{
                  $this->error();
                }
            }
        }
    }

    /**
     * 显示编辑地址
     */
    public function editAddress(){
       
        $id = session('id');
       
        $address_id = I('get.id');
        $table = M('address');
        $single = $table->where("id={$address_id}")->find();

        //依然在上方显示已有的地址
        $data = $table->order('is_default desc')->where("user_id='{$id}'")->select();
        if( $single ){
            $this->assign('single',$single);
            $this->assign('data',$data);
            $this->display('/Person/edit_address');
        }
    }

    /**
     * 接受地址修改操作
     */
    public function saveEdit(){
        $address_id = I('get.id');
        $data = I('post.receive');
        if( $data ){
            $table = M('address');
            $update = $table->where("id={$address_id}")->save($data);

            if( $update ){
                $this->success('修改地址信息成功~~','/home/information/address.html');
            }else{
                $this->error('修改地址信息失败~~');
            }
        }
            
    }

    public function cardlist(){
        $this->display('/Person/cardlist');
    }
}
