<?php
namespace Home\Controller;
use Think\Controller;
class SearchController extends Controller {
    /**
     * 搜索
     */
    public function index(){
    	$key_word = I("get.key_word");	//获取关键词
    	$map['goods_name'] = array('LIKE',"%$key_word%");
    	$goods_info = M("goods")->field("goods_id,goods_name,cumulative_sales")->where($map)->select();
    	foreach($goods_info as $key => $val){
    		$goods_info[$key]['price_show'] = M("goods_specify")->where("goods_id=".$val['goods_id'])->getField("goods_discount");
    		$thumb = M("thumb")->where("goods_id=".$val['goods_id'])->getField('mid');
    		$thumb = unserialize($thumb);
    		$goods_info[$key]['thumb'] = $thumb[0];
    	}
    	$this->assign("goods_info",$goods_info);
        $this->display("search");
    }
}
