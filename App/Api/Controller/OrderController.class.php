<?php
namespace Api\Controller;
use Think\Controller;
class OrderController extends Controller {
	/**
	 *	订单改为已付款状态
	 */
	public function payment(){
		$order_id = I('get.order_id');
		M('order')->where("order_id={$order_id}")->setField("status",1);	//改为已付款状态
	}

	public function cancelOrder(){
		$order_id = I('get.order_id');
		M('order')->where("order_id={$order_id}")->setField("status",9);	//改为取消订单状态
	}
}
