<?php
namespace Home\Controller;
use Think\Controller;
class PayController extends Controller {

    //立即购买页面
    public function index(){
        
        //关闭浏览器后,清除掉原本的临时订单状态session,故此处定temp_order=1时才能进入商品结算页面
        if( session('temp_order') ==1){
            $user_id = session('id');
            $address = M('address')->order('is_default desc')->where("user_id={$user_id}")->select(); //获取地址
            $cart = M('shopcart')->where("user_id={$user_id} AND is_order=1")->select();
            if( empty($cart) ){
                $this->error('未选择需结算的商品...', '/home/pay/shopcart',1);
            }

            foreach($cart as $key=>$val){
                $goods_sn = $val['goods_sn'];
                $thumb = unserialize( M('thumb')->where("goods_sn={$goods_sn}")->getField("mid") );
                $cart[$key]['goods_thumb'] = $thumb[0];

                $ori_price = M('goods_specify')->where("goods_sn={$goods_sn}")->getField("goods_price");
                $cart[$key]['ori_price'] = $ori_price;
                $cart[$key]['single_cost'] = number_format($cart[$key]['goods_num']*$cart[$key]['goods_cost'],2,'.', '');    //单条记录总费用,number_format()使其保留2位小数
                // $cart[$key]['single_cost'] = $cart[$key]['goods_num']*$cart[$key]['goods_cost'];    //单条记录总费用
            }

            $this->assign('cart',$cart);
            $this->assign('address',$address);
            $this->display('pay');
        }else{
            redirect('/home',3,'都没有选择商品,结算什么- -.....');
        }
            
    }

    //添加新地址
    public function addAddress(){

        $receive = I('post.receive');
       
        if( $receive != "" ){
            $receive['addtime'] = time();
            $receive['user_id'] = session('id');    //关联当前账户的id
            $insert = M('address')->add($receive);
            if( $insert ){
              redirect('/home/pay',0);  //添加成功后,重定向回立即购买页面
            }else{
              $this->error();
            }
        }

    }

    //编辑地址
    public function editAddress(){
        $receive = I('post.receive');
        $address_id = I('post.address_id');
        $edit = M('address')->where("id={$address_id}")->save($receive);
        if($edit){
            redirect('/home/pay',0);
        }else{
            $this->error();
        }
    }

    //删除地址
    public function delOne(){
        $id = I('get.address_id');
        $del = M('address')->where("id={$id}")->delete();
        if($del) redirect('/home/pay',0);
        else $this->error();
    }

    //购物车页面
    public function shopcart(){
        if(session('is_login') != 1){
            redirect('/home/login',2,'还未登陆，正在跳转...');
        }

        $user_id = session('id');
        $cart = M('shopcart')->where("user_id={$user_id}")->select();   //取出当前用户的购物车商品
        
        foreach($cart as $key=>$val){
            $goods_sn = $val['goods_sn'];
            $thumb = unserialize( M('thumb')->where("goods_sn={$goods_sn}")->getField("mid") );
            $cart[$key]['goods_thumb'] = $thumb[0];

            $ori_price = M('goods_specify')->where("goods_sn={$goods_sn}")->getField("goods_price");
            $cart[$key]['ori_price'] = $ori_price;
            $cart[$key]['single_cost'] = number_format($cart[$key]['goods_num']*$cart[$key]['goods_cost'],2,'.', '');    //单条记录总费用,number_format()使其保留2位小数
            // $cart[$key]['single_cost'] = $cart[$key]['goods_num']*$cart[$key]['goods_cost'];    //单条记录总费用

            //获取此id商品的所有种类
            $goods_id = $val['goods_id'];
            $attr = M("goods_specify")->where("goods_id={$goods_id}")->select();
            foreach( $attr as $ret ){
                $type[$key][] = $ret['goods_type']; 
                $discount[$key][] = $ret['goods_discount'];
                $num[$key][] = $ret['goods_num'];
            }
            $cart[$key]['type'] = $type[$key];
            $cart[$key]['discount'] = $discount[$key];
            $cart[$key]['num'] = $num[$key];

            //获取此id商品的所有包装
            $package = M("goods")->where("goods_id={$goods_id}")->getField("goods_package");
            $cart[$key]['package'] = unserialize($package);


        }
        $this->assign('cart',$cart);
    	$this->display();
    }

    /**
     *  支付成功
     */
    public function success(){
        $order_id = I('get.order_id');
        $information = M("order")->where("order_id={$order_id}")->select();
        $data = $information[0];
        $this->assign("data",$data);
        $this->display();
    }

}
