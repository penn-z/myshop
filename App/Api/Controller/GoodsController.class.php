<?php
namespace Api\Controller;
use Think\Controller;
class GoodsController extends Controller {

	//统计购物车的里不同商品数量
	public function differentCart(){
		$user_id = session("id");
		echo M('shopcart')->where("user_id={$user_id}")->Count();
	}

	//在商品页面、购物车修改时选择不同规格、包装的变化
    public function change_type(){
			$goods_type = I('post.data');
			$goods_id = I('post.goods_id');
			$attr = M('goods_specify')->where("goods_type ='{$goods_type}' AND goods_id ='{$goods_id}'")->find();
			$this->ajaxReturn($attr);
	}
	
	//立即购买
	public function buyNow(){
		if( session('is_login') != 1){
			echo 1;
		}

		$data = I('post.');	//获取post过来的商品信息
		//先查看选择的商品是否存在于数据库

   		$choice = M('shopcart')->where("goods_type ='".$data['goods_type']."' AND goods_package ='".$data['goods_package']."'")->find();
   		//若不存在
   		if($choice==false){
   			$data['addtime'] = time();	//添加时间
   			$data['user_id'] = session('id');
	   		//获取该品种的序列号
	   		$goods_sn = M("goods_specify")->where("goods_type ='".$data['goods_type']."' AND goods_id =".$data['goods_id'])->getField('goods_sn');
	   		$data['goods_sn'] = $goods_sn;

	   		$insert_id = M('shopcart')->add($data);	//插入数据

	   		M('shopcart')->where("cart_id!={$insert_id}")->setField("is_order",0);	//其他商品改为非临时订单状态
   			$user_id = session('id');
	   		M('temporary_order')->where("user_id={$user_id}")->delete();	//删除所有临时订单表
	   		// 创建临时订单
	   		$order['user_id'] = session('id');	//用户id
	   		$order['cart_id'] = $insert_id;	//商品在的购物车id
	   		$order['addtime'] = time();
	   		$order_ret = M('temporary_order')->add($order); 	//生成临时订单表

   		}
	   	else{	//存在于数据库时,此时按立即购买的话,会把该商品在购物车的商量改为立即购买的数量(模仿京东)
	   		$information = array('goods_num'=>$data['goods_num'],'is_order'=>1,'addtime'=>time());	//设置数量为立即购买数量,临时订单重新生成时间
	   		$update_num = M('shopcart')->where("goods_type ='".$data['goods_type']."' AND goods_package ='".$data['goods_package']."'")->setField($information);

	   		$cart_id = M('shopcart')->where("goods_type ='".$data['goods_type']."' AND goods_package ='".$data['goods_package']."'")->getField('cart_id');	//获取当前此商品购物车id
	   		$user_id = session('id');	//用户id
	   		M('shopcart')->where("cart_id!={$cart_id}")->setField('is_order',0);	//其他商品在购物车的is_order状态改为0,即不为临时订单状态

	   		M('temporary_order')->where("user_id={$user_id}")->delete();	//删除所有临时订单表
	   		//重新生成临时订单表
	   		$order['user_id'] = $user_id;
	   		$order['cart_id'] = $cart_id;
	   		$order['addtime'] = time();
	   		$order_ret = M('temporary_order')->add($order);
	   		
	   	}	
	   	session('temp_order',1);	//设置临时订单的session状态
	}

	//在购物车结算时,生成临时订单
	public function makeTempOrder(){
		$cart_array = I('post.cart_array');

		$user_id = session('id');	//获取用户id
		M('temporary_order')->where("user_id={$user_id}")->delete();	//删除所有临时订单表
		M('shopcart')->where("1=1")->setField("is_order",0);	//把所有购物车商品is_order改为0
		// 改每个被选商品的购物车状态is_order 为 1,并创建相应商品数量的临时订单表
		foreach( $cart_array as $cart_id){
			M('shopcart')->where("cart_id={$cart_id}")->setField("is_order",1);

			$order['user_id'] = $user_id;
			$order['cart_id'] = $cart_id;
			$order['addtime'] = time();
			M('temporary_order')->add($order);
		}
		session('temp_order',1);	//设置临时订单的session状态
	}

	//加入购物车
	public function shopCart(){

		//未登陆无法加入购物车
		if( session('is_login') != 1 ){
   			echo 1;
   		}

   		$data = I('post.');	//获取post过来的商品信息
   		
   		//先查看选择的商品是否存在于数据库
   		$choice = M('shopcart')->where("goods_type ='".$data['goods_type']."' AND goods_package ='".$data['goods_package']."'")->find();
   		if($choice==false){
   			$data['addtime'] = time();	//添加时间
   			$data['user_id'] = session('id');
	   		//获取该品种的序列号
	   		$goods_sn = M("goods_specify")->where("goods_type ='".$data['goods_type']."' AND goods_id =".$data['goods_id'])->getField('goods_sn');
	   		$data['goods_sn'] = $goods_sn;

	   		$insert = M('shopcart')->add($data);	//插入数据
   		}
	   	else{	//存在于数据库时，添加该规格商品的数量即可
	   		$update_num = M('shopcart')->where("goods_type ='".$data['goods_type']."' AND goods_package ='".$data['goods_package']."'")->setInc('goods_num',$data['goods_num']);
	   	}
   		echo M('shopcart')->Count();	//返回购物车记录数


	}

	//购物车修改
	public function changeCart(){
		$data = I('post.');
		$goods_sn = M("goods_specify")->where("goods_id=".$data["goods_id"]." AND goods_type='".$data["goods_type"]."'")->getField("goods_sn");

		$find_ret = M("shopcart")->where("goods_sn={$goods_sn} AND goods_package='".$data["goods_package"]."'")->find(); 	//查看此类型商品是否存在于购物车
		//此类型商品存在于该购物车中
		if( $find_ret != null ){
            if( $find_ret['cart_id'] == $data['cart_id'] ){	//并没有改动类型，只是变动数量
                M("shopcart")->where("cart_id=".$data['cart_id'])->save($data);
            }else{	//变动类型
            	M("shopcart")->where("goods_sn={$goods_sn} AND goods_package='".$data["goods_package"]."'")->setInc("goods_num",$data['goods_num']);
                M("shopcart")->where("cart_id=".$data['cart_id'])->delete();    //删除本商品购物车记录
            }
        }else{	//不存在于购物车中，则更改本身的cart_id内容即可
            $data['goods_sn'] = $goods_sn;
            M("shopcart")->where("cart_id=".$data['cart_id'])->save($data);	
        }
	}

	//单件商品数量减少时
	public function GoodsNumDec(){
		$num = I('post.num');
		$cart_id = I('post.cart_id');
		$increase = M('shopcart')->where("cart_id={$cart_id}")->setDec("goods_num",1);
	}

	//单件商品数量增加
	public function GoodsNumInc(){
		$num = I('post.num');
		$cart_id = I('post.cart_id');
		$decrease = M('shopcart')->where("cart_id={$cart_id}")->setInc("goods_num",1);
	}

	//改变数量失去焦点
	public function GoodsNumChange(){
		$num = I('post.num');
		$cart_id = I('post.cart_id');
		$result = M('shopcart')->where("cart_id={$cart_id}")->setField("goods_num",$num);
	}

	//删除单个商品
	public function delOne(){
		$cart_id = I('post.cart_id');
		$del = M('shopcart')->where("cart_id={$cart_id}")->delete();
	}

	//删除被选中商品
	public function delAll(){
		$cart_id = I('post.cart_id');
		$del = M('shopcart')->where("cart_id={$cart_id}")->delete();
	}

	//生成商品订单表
	public function makeOrder(){
		$express = I('post.express');
		$cart_array = I('post.cart_array');
		$message = I('post.message');
		$user_id = session('id');

		$new_id = $this->fixFourNum($user_id);
		$rand = $this->fixFourNum(rand(0,9999));
		$order_id = time().$new_id.$rand;

		//订单表
		$data['order_id'] = $order_id;
		$data['user_id'] = $user_id;
		$data['status'] = 1;	//状态1为待发货状态
		$data['message'] = $message;
		$data['addtime'] = time();
		$datas = array_merge($data,$express);
		
		M("order")->add($datas);	

		//生成订单商品详细表
		foreach($cart_array as $key=>$cart_id){
			$fetch = M('shopcart')->where("cart_id={$cart_id}")->select();

			$detail['order_id'] = $order_id;	//订单号
			$detail['goods_id'] = $fetch[0]['goods_id'];
			$detail['goods_sn'] = $fetch[0]['goods_sn'];
			$detail['goods_name'] = $fetch[0]['goods_name'];
			$detail['goods_type'] = $fetch[0]['goods_type'];
			$detail['goods_package'] = $fetch[0]['goods_package'];
			$detail['goods_num'] = $fetch[0]['goods_num'];
			$detail['goods_price'] = $fetch[0]['goods_cost'];
		    $thumb = unserialize( M('thumb')->where("goods_sn=".$fetch[0]['goods_sn'])->getField("mid") );
		    $detail['goods_thumb'] = $thumb[0];	//缩略图
		    $detail['addtime'] = time();
		    $ret = M('order_detail')->add($detail);	//订单详细表
		    if($ret != fasle){	//订单详细表生成后，删除在购物车的记录
		    	M('shopcart')->where("cart_id={$cart_id}")->delete();
		    	M('goods_specify')->where("goods_sn=".$detail['goods_sn'])->setDec("goods_num",$detail['goods_num']);	//减少商品的库存
		    }
		}
		M('temporary_order')->where("1=1")->delete();	//删除临时订单
		echo $order_id;	//返回订单号
	}

	/**
	 * 固定为4位数
	 * @param string 数字
	 * @return string xxxx
	 */
	public function fixFourNum($num){
		switch(strlen($num)){
			case 1:
				$new_id = "000".$num;
				break;
			case 2:
				$new_id = "00".$num;
				break;
			case 3:
				$new_id = "0".$num;
				break;
			case 4:
				$new_id = $num;
				break;
		}
		return $new_id;
	}
}
