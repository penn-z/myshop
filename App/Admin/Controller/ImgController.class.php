<?php
namespace Admin\Controller;
use Think\Controller;
class ImgController extends CheckLoginController {

    /**
     * 展示相册列表及相关操作选项
     */
    public function showList(){
    	$Form = M('thumb');

    	$act = I('get.act');
    	if( $act == 'del' ){
    		$id = I('get.id');

                
    		$result = $Form->where("id='{$id}'")->delete();   //删除相应相册数据内容
            $img_model = M('img');  //创建图片数据表对象
            
            if( $img_model->where("album_id='{$id}'")->find() ){
                //要被删除的文件目录路径
                $dirname = '/var/www/thinkphp/Public/Uploads/Images/ablum_id'.$id;  
                $del_album = $this->delDir($dirname);   //删除文件夹及子文件
                //删除相应相册里面的图片数据库内容
                $del_img_table = $img_model->where("album_id='{$id}'")->delete(); 
            }
            
    		$errno = null;
    		if( $result!=false ){
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
		$list = $Form->where('1=1')->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();

		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出


    	$this->display('album_list');
    }

    /**
     * 编辑相册
     */
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

    /**
     * 添加相册
     */
    public function add(){
        $act = I('get.act');
        if( $act == 'add' ){
            $data = I('post.album');
            //判断session是否存在相册名，防止刷新重复提交
            if( session("?{$data['goods_sn']}") != true ){
                $model = M('thumb');
                $is_repeat = $model->where('goods_sn=\''.$data['goods_sn'].'\'')->find();   //检测相册是否存在

                //相册不存在于数据库
                if( $is_repeat != true){
                    $data['addtime'] = time();
                    $result = $model->add($data);   //新相册入库
                    $errno = null;
                    if( $result == true ){
                        $errno = array('style'=>'success','str'=>'相册添加成功！');
                        session("{$data['name']}","{$data['name']}");   //成功后，设置相册名到session，防止刷新重复添加

                    }else{
                        $errno = array('style'=>'error','str'=>'相册添加失败！');
                    } 
                }else{
                    $errno = array('style'=>'error','str'=>'添加失败，相册已存在！');
                }
            }
            $this->assign('errno',$errno);
        }
        $this->display('album_add');
    }

    /**
     * 加载上传图片的页面
     */
    public function upload(){
        /*  原本的upload11  
        $goods_sn = I('get.sn');  //获取相应相册id
        $this->assign('goods_sn',$goods_sn);    //把相册id注入上传图片的模板中
        $this->display('upload11');
        */
        $spe_id = I('get.spe_id');
        $goods_sn = I('get.goods_sn');
        $goods_id = I('get.goods_id');
        $big = M('thumb')->where("goods_sn={$goods_sn}")->getField("big");
        $mid = M('thumb')->where("goods_sn={$goods_sn}")->getField("mid");
        $small = M('thumb')->where("goods_sn={$goods_sn}")->getField("small");

        $big = unserialize($big);   //反序列化图片数组
        $mid = unserialize($mid);
        $small = unserialize($small);
        $this->assign("big",$big);
        $this->assign("mid",$mid);
        $this->assign("small",$small);
        $this->assign("sep_id",$spe_id);
        $this->assign("goods_sn",$goods_sn);
        $this->display('upload11');
    }

    /**
     * 上传图片操作
     */
    public function accept(){
        
        $goods_sn = I('post.goods_sn'); 
        //点击添加按钮时，路径存入数据库
        if(I('post.upload') == 'add' && I('post.big') != ''){
            $big_path = I('post.big');
            $mid_path = I('post.mid');
            $small_path = I('post.small');

            $data = array(
                'big' => serialize($big_path),
                'mid' => serialize($mid_path),
                'small' => serialize($small_path)
            );
            $model = M('thumb');  //创建数据表模型
            $result = $model->where("goods_sn={$goods_sn}")->save($data);
            if($result === false) $this->error('上传略缩图失败！');
            else $this->success('缩略图添加成功！');
        }else{  //点击上传文件时，ajax异步上传处理图片
            $_uploadDir ="Public/Uploads/goods/";
            
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  =     $_uploadDir; // 设置附件上传根目录
            $upload->savePath  =     'sn'.$goods_sn.'/'; // 设置附件上传（子）目录
            $upload->saveName  = array('uniqid','');
            $upload->autoSub = false;
            // 上传文件 
            $info   =   $upload->upload();
            if(!$info) {// 上传错误提示错误信息
                $data = array(
                    'status'    => false,
                    'info'      => "3",
                    'data'      => "上传错误"
                );
                $this->ajaxReturn($data);
            }else{// 上传成功
                

                //图片上传的路径
                $upload_path = '/Public/Uploads/goods/'.$info[0]['savepath'].$info[0]['savename'];
                //图像处理
                $image = new \Think\Image();
                $image->open('.'.$upload_path);

                $pre_name = explode('.',$info[0]['name'])[0];   //取原图片前缀名

                //按照原图的比例生成一个最大为800*800缩略图
                $save_path = '/Public/Uploads/goods/'.$info[0]['savepath'].$pre_name.'_big.jpg';
                
                $big_ret = $image->thumb(800, 800,\Think\Image::IMAGE_THUMB_FIXED)->save('./'.$save_path); 

                //生成一个350*350缩略图
                $save_path = '/Public/Uploads/goods/'.$info[0]['savepath'].$pre_name.'_mid.jpg';
                
                $mid_ret = $image->thumb(350,350,\Think\Image::IMAGE_THUMB_FIXED)->save('./'.$save_path);

                //生成一个60*60缩略图
                $save_path = '/Public/Uploads/goods/'.$info[0]['savepath'].$pre_name.'_small.jpg';
                
                $samll_ret = $image->thumb(60,60,\Think\Image::IMAGE_THUMB_FIXED)->save('./'.$save_path);

                unlink('/var/www/shop'.$upload_path);//删除原上传图片

                $big_path = '/Public/Uploads/goods/'.$info[0]['savepath'].$pre_name.'_big.jpg';
                $mid_path = '/Public/Uploads/goods/'.$info[0]['savepath'].$pre_name.'_mid.jpg';
                $small_path = '/Public/Uploads/goods/'.$info[0]['savepath'].$pre_name.'_small.jpg';
                $data = array(
                    'status'    => true,
                    'info'      => "上传成功",
                    'big_path'      => $big_path,
                    'mid_path'      => $mid_path,
                    'small_path'      => $small_path
                );
                $this->ajaxReturn($data);
            }
        }
    }

    /** 
     *  删除文件夹及子文件
     *  @param string $dir 文件目录路径名 
     *  @return bool true|false
     */
    public function delDir($dir){
        if($handle=opendir("$dir")){
            while(false!==($item=readdir($handle))){
                if( $item!="." && $item!=".."){
                    if( is_dir("$dir/$item") ) $this->delDir("$dir/$item");
                    else unlink("$dir/$item");
                }
            }
            closedir($handle);
            if( rmdir($dir) ) return true;
            else return false;
        }
    }
}
