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
	    	/*-------排序方法----------*/
    		if( I("get.order") == "sales" ){
    			$dec = "cumulative_sales desc";	//销量降序	
    		}else if( I("get.order") == "price" ){
    			$dec = "goods_discount asc";	//价钱升序	
    		}else if( I("get.order") == "comment" ){
    			$dec = "goods_evaluation desc";
    		}else{
    			$dec = "";
    		}
    		
    		/*--------品牌、种类、选购热点------*/
    		if( I("get.brand") != "" || I("get.category_id") != "" || I("get.hot_spot") != ""){
    			if( I("get.brand") != "" ) $map['goods_source'] = I("get.brand");

    			if(I("get.category_id") != "") $map['category_id'] = I("get.category_id");
    		} 

	    	$goods_info = M("goods")->field("goods_id,goods_name,cumulative_sales,goods_source,category_id")->where($map)->order($dec)->select();
	    	$goods_num = M("goods")->where($map)->count();
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
		    	}
		    	
		    	$brand = array_unique($brand);	//对品牌进行去重复
		    	$this->assign("brand",$brand);

		    	$category = array_unique($category);	//对种类进行去重复
		    	$this->assign("category",$category);

		    	$category_id = array_unique($category_id);
		    	$this->assign("category_id",$category_id);

		    	$this->assign("goods_info",$goods_info);
	    	}
	    	// echo "<pre>";
	    	// print_r($goods_info);
    	}
        $this->display("search");
    }

}
