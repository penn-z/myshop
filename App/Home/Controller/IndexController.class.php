<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	$cat = M('goods_category')->field('id,category,description')->select();	//取出最大范畴
    	$cat_num = M('goods_category')->count();	//范畴的个数
    	$goods_info = array();	//定义数组储存商品详细信息
    	foreach($cat as $key => $val){
    		$cat_id = $val['id'];
    		$cat[$key]['second'] = M('goods')->distinct(true)->field('second_cat')->where("category_id={$cat_id}")->select();	//第二范畴
    		$cat[$key]['brand'] = M('goods')->distinct(true)->field('goods_source')->where("category_id={$cat_id}")->select();	//商家品牌
    		$goods_info[$key] = M('goods')->field('goods_name,goods_id')->where("category_id={$cat_id}")->select();
    		$category[$key]['category'] = $val['category'];
    		$category[$key]['second'] = $cat[$key]['second'];
    		$category[$key]['description'] = $val['description'];
    	}
    	// echo "<pre>";
    	// print_r($category);
    	$this->assign('category',$category);	//把范畴与第二范畴渲染

    	foreach($goods_info as $key => $val){
    		foreach($val as $index => $single){
    			$goods_discount = M('goods_specify')->where("goods_id={$single['goods_id']}")->getField('goods_discount');	//取此商品第一个规格的价钱
    			$goods_thumb = M('thumb')->where("goods_id={$single['goods_id']}")->getField('big');
    			$goods_thumb = unserialize($goods_thumb);
    			$val[$index]['goods_discount'] = $goods_discount;
    			$val[$index]['goods_thumb'] = $goods_thumb[0];
    			$val[$index]['category'] = $category[$key];
    		}
    		$goods_info[$key] = $val;
    	}
    	// echo "<pre>";
    	// print_r($goods_info);
    	$this->assign('goods_info',$goods_info);
    	/*//商家
    	for($i=0;$i<$cat_num;$i+=2){
    		$cat[$i]['brand'] = array_merge($cat[$i]['brand'],$cat[$i+1]['brand']);
    		echo "<pre>";
    		print_r($cat[$i]['brand']);
    	}*/
    	
    	$this->assign('cat',$cat);
    	$this->assign('cat_num',$cat_num);
    	$this->display('home3');
    }
}
