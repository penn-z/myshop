<?php
namespace Api\Controller;
use Think\Controller;
class OrderController extends Controller {
	/**
	 *	一键支付
	 */
	public function payment(){
		$order_id = I('get.order_id');
		M('order')->where("order_id={$order_id}")->setField("status",1);	//改为已付款状态
	}

    /**
     * 发货
     */
    public function sentOrder(){
        $order_id = I("get.order_id");
        $ret= M("order")->where("order_id={$order_id}")->setField("status",2);    //改为发货状态
        if( $ret == 1) echo $ret;
        else echo false;
    }

	/**
	 * 取消订单
	 */
	public function cancelOrder(){
		$order_id = I('get.order_id');
		M('order')->where("order_id={$order_id}")->setField("status",9);	//改为取消订单状态
	}

	/**
	 * 确认收货
	 */
	public function sureGoods(){
		$order_id = I('get.order_id');
		$ret = M('order')->where("order_id={$order_id}")->setField("status",3);	//改为待评价状态
		echo $ret;
	}

	/**
	 * 添加评论
	 */
	public function uploadComment(){
		$data = I("post.information");
		$data['user_id'] = session('id');
		$data['picture'] = serialize($data['picture']);
		$goods_sn = $data['goods_sn'];
		$order_id = $data['order_id'];
		$detail = M("order_detail")->where("order_id={$order_id} AND goods_sn={$goods_sn}")->find();	//取该sn的详细信息
		$data['goods_id'] = $detail['goods_id'];
		$data['goods_name'] = $detail['goods_name'];
		$data['goods_type1'] = $detail['goods_type1'];
		$data['type1_name'] = $detail['goods_type'];
		$data['goods_type2']= $detail['goods_type2'];
		$data['type2_name'] = $detail['goods_package'];
		$data['goods_thumb'] = $detail['goods_thumb'];
		$data['addtime'] = time();

		$ret_id = M("person_comment")->add($data);	//数据插入个人商品评价表

		//以下是插入商家商品评价表
		$data['user_name'] = session('username');
		$data['user_id'] = session('id');
		$ret2_id = M("comment")->add($data);

		//评价数据插入成功后，更改此订单的状态
		if( $ret_id != false && $ret2_id != false ){
			$result = M('order')->where("order_id={$order_id}")->setField("status",4);	//status=4为已评价状态
			if($result != false){
				echo "1";
			}
		}

	}

	/**
     * 删除晒图
     */
    public function delCommentPic(){
        $path = I('get.full_path');
        unlink($path);
    }

    /**
     * 上传评价或退款凭证图片
     */
    public function uploadPic(){
        $goods_sn = I('post.goods_sn');
        $user_id = session('id');   //获取用户id
        $order_id = I('post.order_id'); //订单号
        if( I('post.type') == "评价" ){
			$_uploadDir ="Public/Uploads/comment/person/";
        }else if( I('post.type') == "退款凭证" ){
        	$_uploadDir ="Public/Uploads/refund/";
        }
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     $_uploadDir; // 设置附件上传根目录
        $upload->savePath  =     'user_id'.$user_id.'/order_id'.$order_id.'/sn'.$goods_sn.'/'; // 设置附件上传（子）目录
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
            $path = '/'.$_uploadDir.$info[0]['savepath'].$info[0]['savename'];
            $data = array(
                'status'    => true,
                'info'      => "上传成功",
                'path'      => $path,
            );
            $this->ajaxReturn($data);
        }
    }

    /**
     * 提交退货退款申请
     */
    public function refund(){
    	$info = I('post.info');
    	// var_dump($info);
    	$info['addtime'] = time();
    	$info['user_id'] = session('id');
    	$info['status'] = 1;	//status=1为等待商家退款状态
    	$info['path'] = serialize($info['path']);	//把图片地址序列化
    	$ret1 = M('refund')->add($info);	//添加退款数据
    	$ret2 = M('order_detail')->where("order_id=".$info['order_id']." AND goods_sn=".$info['goods_sn'])->setField("status",1);	//status=1为等待商家退款状态
    	if( $ret1 != false && $ret2 != fasle ) echo "ok";
    }
}
