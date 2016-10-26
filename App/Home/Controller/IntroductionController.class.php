<?php
namespace Home\Controller;
use Think\Controller;
class IntroductionController extends Controller {
    //商品详细页面
    public function index(){
    	$goods_id = I('get.id','',int);
    	$goods_sn = I('get.sn','',int);
    	$goods = M('goods')->find($goods_id);  //获取商品的共同属性
    	// $goods['goods_package'] = unserialize($goods['goods_package']);     //先注释,可能有bug需要重新用
    	// $goods['goods_type'] = unserialize($goods['goods_type']);           //先注释,可能有bug需要重新用

        //获取不同规格商品的特有属性
        $specify = M('goods_specify')->where("goods_id={$goods_id}")->select();
        $type = array();
        foreach($specify as $val){
            $type[] = $val['goods_type'];   //把type组成数组
        }
        $this->assign('specify',$specify);  //把规格1注册入模板

        //获取规格2属性
        $type2 = M("goods_type2")->where("goods_id={$goods_id}")->select();
        foreach( $type2 as $val ){ 
            $type2_name[] = $val['type2_name'];
        }
        $this->assign("type2_name",$type2_name);    //把规格2注册入模板
        $this->assign('type',$type);    //注册进模板

    	$thumb = M('thumb')->where("goods_sn={$goods_sn}")->find();    //获取缩略图地址
    	$thumb['big'] = unserialize($thumb['big']);
    	$thumb['mid'] = unserialize($thumb['mid']);
    	$thumb['small'] = unserialize($thumb['small']);
    	$this->assign('thumb',$thumb);
        
        // $description = M('attr')->where("goods_sn={$goods_sn}")->getField('picture_description');

        $different_goods = M('shopcart')->where("user_id=".session('id'))->Count();    //统计购物车不同商品数量
        $this->assign("different_goods",$different_goods);
        $this->assign('description',$description);
    	$this->assign('goods',$goods);


        $comment = M("comment")->where("goods_id={$goods_id}")->select();
        // $comment = M("user")->where("user_id")
        // echo "<pre>";
        // print_r($goods);
    	$this->display('introduction');
    }

}
