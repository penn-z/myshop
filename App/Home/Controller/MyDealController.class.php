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
        /*echo "<pre>";
        print_r($common);
        print_r($order_detail);*/
        $this->assign('common',$common);
        $this->assign('order_detail',$order_detail);
        /*foreach($Nosent as $Nosent_single){
            $order_id = $Nosent_single['order_id'];
            $nosent_detail = M("order_detail")->where("order_id={$order_id}")->select();
            $nosent_details[] = $nosent_detail;
        }
        $this->assign("nosent_details",$nosent_details);  //$details为三维数组
        $this->assign("Nosent",$Nosent);*/

        $this->display("Person/orderinfo");
    }
}
