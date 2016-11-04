<?php
namespace Admin\Controller;
use Think\Controller;
class OrderController extends CheckLoginController {
    /**
     * 显示订单列表
     */
    public function showlist(){
        $list = M('order');
        $count      = $list->where('1=1')->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(5)
        $Page->rollPage = 5;    //显示的页码数
        unset($Page->parameter['act']);     //删除act动作，这样删除成功一次后就不会就带参数传递了
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $result = $list->where('1=1')->order('addtime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        foreach( $result as $key => $val ){
        	$result[$key]['buyer_name'] = M("user")->where("id={$val['user_id']}")->getField("account");	//获取此订单会员名称
            $is_refund = M("order_detail")->field("status")->where("order_id={$val['order_id']}")->select();    //获取此订单下的各商品是否有申请退款状态

            /*此处遍历$is_refund，找出有退款状态的订单*/
            foreach( $is_refund as $vv ){
                $result[$key]['is_refund'] = 0;
                if( $vv['status'] == 1 ){
                    $result[$key]['is_refund'] = 1;
                    break;
                }
            }
        }
        $this->assign('page',$show);
        $this->assign('list',$result);
        $this->display('order_list');
    }

    /**
     * 查看退款申请
     */
    public function showRefund(){
        $order_id = I("get.order_id");

        $refund_detail = M("refund")->where("order_id={$order_id} AND status=1")->select();
        foreach( $refund_detail as $key => $val ){
            $path = $val['path'];
            $refund_detail[$key]['path'] = unserialize($path);  //反序列化退款凭证图片地址
            $goods_detail[$key] = M("order_detail")->where("order_id={$val['order_id']} AND goods_sn={$val['goods_sn']}")->find();  //获取退款商品的详细信息
            $refund_detail[$key]['username'] = M("user")->where("id={$val['user_id']}")->getField("account");   //获取用户名
            $this_total = $goods_detail[$key]['goods_price']*$goods_detail[$key]['goods_num'];  //该商品总额
            $goods_detail[$key]['this_total'] = number_format($this_total,2,'.','');    //取两位小数
        }
       
        $this->assign("goods_detail",$goods_detail);
        $this->assign("refund_detail",$refund_detail);
        $this->display("refund_info");
    }

    /**
     * 更改订单费用
     */
    public function fee_change(){
    	$order_id = I("get.order_id");
    	$order_info = M("order")->where("order_id={$order_id}")->find();
    	
    	$this->assign("order_info",$order_info);
    	$this->display("fee_change");
    }

    /** 
     * 订单详情
     */
    public function order_info(){
    	$order_id = I("get.order_id");
    	$order_info = M("order")->where("order_id={$order_id}")->find();
    	$order_detail = M("order_detail")->where("order_id={$order_id}")->select();
        foreach($order_detail as $key => $val){
            $this_total = $val['goods_price']*$val['goods_num'];
            $order_detail[$key]['this_total'] = number_format($this_total,2,'.','');
        }
    	$this->assign("order_info",$order_info);
    	$this->assign("order_detail",$order_detail);
    	$this->display("order_info");
    }

    /**
     * 退款列表
     */
    public function showRefundList(){
        $list = M("refund")->select();
        foreach($list as $key => $val){
            $list[$key]['account'] = M("user")->where("id={$val['user_id']}")->getField("account");
        }
        $this->assign("list",$list);
        $this->display("refund_list");
    }
    
}