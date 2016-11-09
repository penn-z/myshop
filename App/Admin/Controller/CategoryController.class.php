<?php
namespace Admin\Controller;
use Think\Controller;
class CategoryController extends CheckLoginController {

    /**
     * 展示分类列表及相关操作选项
     */
    public function showList(){
    	$Form = M('goods_category');

    	$act = I('get.act');
    	if( $act == 'del' ){
    		$id = I('get.id');
    		$result = $Form->where("id='{$id}'")->delete();   //删除相应分类数据内容
            $img_model = M('img');  //创建图片数据表对象
            
            if( $img_model->where("album_id='{$id}'")->find() ){
                //要被删除的文件目录路径
                $dirname = '/var/www/thinkphp/Public/Uploads/Images/ablum_id'.$id;  
                $del_album = $this->delDir($dirname);   //删除文件夹及子文件
                //删除相应分类里面的图片数据库内容
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
		$Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(10)
        $Page->rollPage = 5;    //显示的页码数
        unset($Page->parameter['act']);     //删除act动作，这样删除成功一次后就不会就带参数传递了
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $Form->where('1=1')->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();

		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
    	$this->display('category_list');
    }

    /**
     * 编辑分类
     */
    public function edit(){
    	$act = I('get.act');
    	$id = I('get.id'); //分类id

    	if( $act == 'edit' ){
    		$model = M('goods_category');
    		$data = $model->find($id);
            $this->assign('id',$id);
    		$this->assign('data',$data);
    	}

    	if( $act == 'update' ){
    		$model = M('goods_category');
    		$_data = I('post.cat');
    		$result = $model->where("id={$id}")->save($_data);
    		$errno = null;
    		if( $result != false){
                $errno = array('style'=>'success','str'=>'分类编辑成功！');
            }else{
                $errno = array('style'=>'error','str'=>'分类编辑失败！');
            }
            $this->assign('errno',$errno);
    	}
    	$this->display('category_edit');
    }

    /**
     * 添加分类
     */
    public function add(){
        $act = I('get.act');
        if( $act == 'add' ){
            $data = I('post.cat');
            //判断session是否存在分类名，防止刷新重复提交
            if( session("?{$data['goods_sn']}") != true ){
                $model = M('goods_category');
                $is_repeat = $model->where("category='".$data['category']."'")->find();   //检测分类是否存在
                echo $model->getLastSql();
				$errno = null;
                //分类不存在于数据库
                if( $is_repeat == null){
                    $result = $model->add($data);   //新分类入库
                    if( $result == true ){
                        $errno = array('style'=>'success','str'=>'分类添加成功！');
                        session("category".$result,$data['category']);   //成功后，设置分类名到session，防止刷新重复添加
                    }else{
                        $errno = array('style'=>'error','str'=>'分类添加失败！');
                    } 
                }else{
                    $errno = array('style'=>'error','str'=>'添加失败，分类已存在！');
                }
            }
            $this->assign('errno',$errno);
        }
        $this->display('category_add');
    }
}
