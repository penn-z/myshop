<?php
namespace Home\Controller;
use Think\Controller;
class SearchController extends Controller {
    /**
     * 搜索
     */
    public function index(){
    	$key_word = I("get.key_word");	//获取关键词
    	if($key_word == null || $key_word == ''){
    		$this->assign("error",1);	//表示未搜索到任何商品
    	}else{
	    	$map['goods_name'] = array('LIKE',"%$key_word%");

	    	/*-------综合、销量、评价排序----------*/
    		if( I("get.order") == "sales" ){
    			$dec = "cumulative_sales desc";	//销量降序	
    		}else if( I("get.order") == "comment" ){
    			$dec = "goods_evaluation desc";
    		}else{
    			$dec = "";
    		}
    		/*-------综合、销量、评价排序----------*/
    		
	    	$goods_info = M("goods")->field("goods_id,goods_name,cumulative_sales,goods_source,category_id,hot_spot")->where($map)->order($dec)->select();
	    	$goods_num = M("goods")->where($map)->count();		//搜到的商品数量
	    	$this->assign("goods_num",$goods_num);
	    	
	    	if( empty($goods_info) ){	//根据关键词无法搜到结果
	    		$this->assign("error",1);
	    	}else{
	    		foreach($goods_info as $key => $val){
	    			$brand[] = $val['goods_source'];
	    			unset($goods_info[$key]['goods_source']);
		    		$goods_info[$key]['price_show'] = M("goods_specify")->where("goods_id=".$val['goods_id'])->getField("goods_discount");
		    		$category[] = M("goods_category")->where("id=".$val['category_id'])->getField("category");	//种类数组
		    		$category_id[] = $val['category_id'];	//种类id数组
		    		$thumb = M("thumb")->where("goods_id=".$val['goods_id'])->getField('mid');
		    		$thumb = unserialize($thumb);
		    		$goods_info[$key]['thumb'] = $thumb[0];

		    		$hot_spot[] = $val['hot_spot'];
		    		$goods_info[$key]['rel_info'] = $brand[$key]." ".$category[$key]." ".$hot_spot[$key];	//合并字符串,作为商品的隐藏域，进行筛选
		    	}

		    	/*价钱排序，对结果进行排序*/
		    	if( I("get.order") == 'price_asc' ){
		    		$goods_info = $this->order_price($goods_info,0);	//价钱升序
		    	}elseif( I("get.order") == 'price_desc' ){
		    		$goods_info = $this->order_price($goods_info,1);	//价钱降序
		    	}
		    	$order = I("get.order");
		    	$this->assign("order",$order);	//排序方法注入模板

		    	$brand = array_unique($brand);	//对品牌进行去重复
		    	$this->assign("brand",$brand);

		    	$category = array_unique($category);	//对种类进行去重复
		    	$this->assign("category",$category);

		    	$category_id = array_unique($category_id);
		    	$this->assign("category_id",$category_id);

		    	$hot_spot = array_unique($hot_spot);	//对选购热点进行去重复
		    	$this->assign("hot_spot",$hot_spot);

		    	$this->assign("goods_info",$goods_info);
	    	}
	    	
    	}
        $this->display("search");
    }

    /**
     * 价钱排序
     * @param array()=>待排序数组 , int 0=>升序|1=>降序
     * @return 排序后数组 | false
     */
    public function order_price($arrays,$order=0){
    	$num = count($arrays);
    	if( $order == 0 ){
			for( $i=0; $i<$num; $i++ ){
				for( $j=0; $j<$num-$i-1; $j++){
					if( $arrays[$j]['price_show'] > $arrays[$j+1]['price_show'] ){
	    				$temp = $arrays[$j];
	    				$arrays[$j] = $arrays[$j+1];
	    				$arrays[$j+1] = $temp;
					}
				}
			}
    	}else if( $order == 1 ){
    		for( $i=0; $i<$num; $i++ ){
				for( $j=0; $j<$num-$i-1; $j++){
					if( $arrays[$j]['price_show'] < $arrays[$j+1]['price_show'] ){
	    				$temp = $arrays[$j];
	    				$arrays[$j] = $arrays[$j+1];
	    				$arrays[$j+1] = $temp;
					}
				}
			}
    	}else{
    		return false;
    	}
    	return $arrays;
    }
}
