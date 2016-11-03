<?php
namespace Home\Controller;
use Think\Controller;
class MyDealController extends CheckLoginController {
    /**
     * 订单管理
     */
	public function order(){
        $user_id = session('id');

        //待付款
        $Nopay = M("order")->where("user_id={$user_id} AND status=0")->select();
        foreach($Nopay as $Nopay_single){
            $order_id = $Nopay_single['order_id'];
            $nopay_detail = M("order_detail")->where("order_id={$order_id}")->select();
            $nopay_details[] = $nopay_detail;
        }
        $this->assign("nopay_details",$nopay_details);  //nopay_details为三维数组
        $this->assign("Nopay",$Nopay);

        //待发货
        $Nosent = M('order')->where("user_id={$user_id} AND status=1")->select();
        foreach($Nosent as $Nosent_single){
            $order_id = $Nosent_single['order_id'];
            $detail = M("order_detail")->where("order_id={$order_id}")->select();
            $details[] = $detail;
        }
        $this->assign("details",$details);  //$details为三维数组
        $this->assign("Nosent",$Nosent);

        //待收货
        $Senting = M('order')->where("user_id={$user_id} AND status=2")->select();
        foreach($Senting as $Senting_single){
            $order_id = $Senting_single['order_id'];
            $senting_detail = M("order_detail")->where("order_id={$order_id}")->select();
            $senting_details[] = $senting_detail;
        }
        $this->assign("senting_details",$senting_details);  //senting_details为三维数组
        $this->assign("Senting",$Senting);

        //待评价
        $Evaluate = M('order')->where("user_id={$user_id} AND status=3")->select();
        foreach($Evaluate as $Evaluate_single){
            $order_id = $Evaluate_single['order_id'];
            $evaluate_detail = M("order_detail")->where("order_id={$order_id}")->select();
            $evaluate_details[] = $evaluate_detail;
        }
        $this->assign("evaluate_details",$evaluate_details);    //evaluate_details为三维数组
        $this->assign("Evaluate",$Evaluate);

        //已评价
        $Evaluated = M('order')->where("user_id={$user_id} AND status=4")->select();
        foreach($Evaluated as $Evaluated_single){
            $order_id = $Evaluated_single['order_id'];
            $evaluated_detail = M("order_detail")->where("order_id={$order_id}")->select();
            $evaluated_details[] = $evaluated_detail;
        }
        $this->assign("evaluated_details",$evaluated_details);  //evaluated_details为三维数组
        $this->assign("Evaluated",$Evaluated);

        //已成功退款
        $already_refund = M('order')->where("user_id={$user_id} AND status=5")->select();
        foreach($already_refund as $refund_single){
            $order_id = $refund_single['order_id'];
            $refund_detail = M("order_detail")->where("order_id={$order_id}")->select();
            $refund_details[] = $refund_detail;
        }
        $this->assign("refund_details",$refund_details);  //refund_details为三维数组
        $this->assign("already_refund",$already_refund);

        //已关闭交易
        $cancel_order = M('order')->where("user_id={$user_id} AND status=9")->select();
        foreach($cancel_order as $cancel_single){
            $order_id = $cancel_single['order_id'];
            $cancel_detail = M("order_detail")->where("order_id={$order_id}")->select();
            $cancel_details[] = $cancel_detail;
        }
        $this->assign("cancel_details",$cancel_details);  //cancel_details为三维数组
        $this->assign("cancel_order",$cancel_order);

        //渲染模板
        $this->display("Person/order");
    }

    /**
     *  不同状态下订单详情
     */
    public function orderinfo(){
        $order_id = I('get.order_id');
        $user_id = session('id');
        $common = M('order')->where("order_id={$order_id}")->find();    //订单共同信息
        $order_detail = M('order_detail')->where("order_id={$order_id}")->select(); //订单详细信息
        
        $this->assign('common',$common);
        $this->assign('order_detail',$order_detail);
        

        $this->display("Person/orderinfo");
    }

    /**
     * 退款退货
     */
    public function refund(){
        $order_id = I('get.order_id');
        $goods_sn = I('get.goods_sn');
        //取当前被退货商品详细信息
        $detail = M('order_detail')->where("order_id={$order_id} AND goods_sn={$goods_sn}")->find();
        //取运费
        $detail['express_fee'] = M("order")->where("order_id={$order_id}")->getField("express_fee");    //运费
        $goods_this_cost = $detail['goods_price'] * $detail['goods_num'];
        $detail['goods_this_cost'] = number_format($goods_this_cost,2,'.','');  //小计
        $goods_this_total = $detail['goods_this_cost'] + $detail['express_fee'];
        $detail['goods_this_total'] = number_format($goods_this_total,2,'.','');    //总计
        $this->assign("detail",$detail);

        //如果是正在退款状态进入
        $refund_info = M("refund")->where("order_id={$order_id} AND goods_sn={$goods_sn}")->find();
        $refund_info['path'] = unserialize($refund_info['path']);   //反序列化凭证图片地址
        $this->assign("refund_info",$refund_info);

        $this->display("Person/refund");
    }

    /**
     * 取消退款
     */
    public function refundCancel(){
        $order_id = I('get.order_id');
        $goods_sn = I('get.goods_sn');
        M("order_detail")->where("order_id=".$order_id." AND goods_sn=".$goods_sn)->setField("status",0);   //订单商品status=0为正常状态
        $path = M("refund")->where("order_id=".$order_id." AND goods_sn=".$goods_sn)->getField("path");
        $path = unserialize($path); //反序列化上传凭证图
        $prev_path = explode('sn',$path[0])[0];
        $full_path = "/var/www/shop".$prev_path."sn".$goods_sn; //拼接成完整目录路径，便于删除
        $del = A('Api/File');  //跨Admin模块实例化Img类
        $del->delDir($full_path);      //删除所在目录及目录下所有子文件  
        $ret = M("refund")->where("order_id=".$order_id." AND goods_sn=".$goods_sn)->delete(); //删除对应的退款数据
        if( $ret != false ) echo "1";
    }

    /**
     * 物流信息
     */
    public function logistics(){
        $this->display("Person/logistics");
    }

    /**
     * 评价管理
     */
    public function comment(){
        $user_id = session('id');

        $pic_comment = M('person_comment')->where("user_id={$user_id}")->select();
        foreach($pic_comment as $key => $val){
            $pic_comment[$key]['picture'] = unserialize($val['picture']);
        }
        $this->assign("pic_comment",$pic_comment);

        $nopic_comment = M('person_comment')->where("user_id={$user_id} AND picture!='N;'")->select();
        foreach($nopic_comment as $key => $val){
            $nopic_comment[$key]['picture'] = unserialize($val['picture']);
        }
        $this->assign("nopic_comment",$nopic_comment);
       
        $this->display("Person/comment");
    }

    /**
     *  评价商品
     */
    public function commentlist(){
        $order_id = I("get.order_id");
        $detail  = M('order_detail')->where("order_id={$order_id}")->select();
        $this->assign("detail",$detail);
        $this->display("Person/commentlist");
    }

    /**
     * 退款售后
     */
    public function change(){
        $user_id = session('id');
        $refund = M("refund")->where("user_id={$user_id}")->select();
        foreach($refund as $key => $val){
            $info = M("order_detail")->where("order_id=".$val['order_id']." AND goods_sn=".$val['goods_sn'])->find();   //获取退款商品的详细信息
            $refund[$key]['goods_name'] = $info['goods_name'];
            $refund[$key]['goods_type1'] = $info['goods_type1'];
            $refund[$key]['type1_name'] = $info['goods_type'];
            $refund[$key]['goods_type2'] = $info['goods_type2'];
            $refund[$key]['type2_name'] = $info['goods_package'];
            $refund[$key]['goods_thumb'] = $info['goods_thumb'];
        }
        $this->assign("refund",$refund);
        $this->display("Person/change");
    }
}
