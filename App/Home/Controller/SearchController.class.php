<?php
namespace Home\Controller;
use Think\Controller;
class SearchController extends CheckAuthController {
    /**
     * 搜索
     */
    public function index(){
    	$key_word = I("get.key_word");	//获取关键词
    	if($key_word == null || $key_word == ''){
    		$this->assign("error",1);	//表示未搜索到任何商品
    	}else{
    		$sec_cat = I("get.sec_cat");
    		if($sec_cat != null && $sec_cat != ''){
    			$map['second_cat'] = array('LIKE',"$sec_cat");
    		}else{
    			$map['goods_name'] = array('LIKE',"%$key_word%");
    		}
	    	

	    	/*-------综合、销量、评价排序----------*/
	    	$order = I("get.order");	//获取排序方法
    		if( $order == "sales" ){
    			$dec = "cumulative_sales desc";	//销量降序	
    		}else if( $order == "comment" ){
    			$dec = "goods_evaluation desc";
    		}else if( $order == 'price_asc' ){	//价钱升序
    			$dec = "think_goods_specify.goods_discount asc";
    		}else if( $order == 'price_desc' ){	//价钱降序
    			$dec ="think_goods_specify.goods_discount desc";
    		}else{
    			$dec = "";
    		}
	    	$this->assign("order",$order);	//排序方法注入模板
    		/*-------综合、销量、评价排序----------*/
	    		
	    	/*------------------分页-------------------*/
	    	$count = M('goods')->where($map)->count("DISTINCT goods_id");	//符合搜索词的商品总数
	    	$Page       = new \Think\Page($count,12);// 实例化分页类 传入总记录数和每页显示的记录数(3)
	        $Page->rollPage = 5;    //显示的页码数
	        unset($Page->parameter['act']);     //删除act动作，这样删除成功一次后就不会就带参数传递了
			$show       = $Page->show();// 分页显示输出
			$this->assign("page",$show);	//渲染分页样式
	    	/*------------------分页-------------------*/

			//根据条件搜索商品详细信息
	    	$goods_info = M("goods")->join("think_goods_specify ON think_goods.goods_id=think_goods_specify.goods_id")->field("think_goods.goods_id,goods_name,cumulative_sales,goods_source,category_id,hot_spot,think_goods_specify.goods_discount")->group("goods_id")->order($dec)->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
	    	$goods_num = M("goods")->where($map)->count();		//搜到的商品数量
	    	$this->assign("goods_num",$goods_num);
	    	
	    	if( empty($goods_info) ){	//根据关键词无法搜到结果
	    		$this->assign("error",1);
	    	}else{
	    		foreach($goods_info as $key => $val){
	    			$brand[] = $val['goods_source'];
	    			unset($goods_info[$key]['goods_source']);
		    		$category[] = M("goods_category")->where("id=".$val['category_id'])->getField("category");	//种类数组
		    		$category_id[] = $val['category_id'];	//种类id数组
		    		$thumb = M("thumb")->where("goods_id=".$val['goods_id'])->getField('mid');
		    		$thumb = unserialize($thumb);
		    		$goods_info[$key]['thumb'] = $thumb[0];
		    		$hot_spot[] = $val['hot_spot'];	//热点数组
		    		$goods_info[$key]['rel_info'] = $brand[$key]." ".$category[$key]." ".$hot_spot[$key];	//合并字符串,作为商品的隐藏域，进行筛选
		    	}
		    	$brand = array_unique($brand);	//对品牌进行去重复
		    	$this->assign("brand",$brand);

		    	$category = array_unique($category);	//对种类进行去重复
		    	$this->assign("category",$category);

		    	$category_id = array_unique($category_id);	//对种类id进行去重复
		    	$this->assign("category_id",$category_id);

		    	$hot_spot = array_unique($hot_spot);	//对选购热点进行去重复
		    	$this->assign("hot_spot",$hot_spot);
		    	// echo "<pre>";
		    	// print_r($goods_info);
		    	$this->assign("goods_info",$goods_info);	//渲染详细数据
	    	}
    	}

    	if( session('?id') ){   //当用户在登录状态时，统计购物车商品数量
    		$user_id = session('id');	//获取用户id
            $different_goods = M('shopcart')->where("user_id=".$user_id)->Count();    //统计购物车不同商品数量
            $this->assign("different_goods",$different_goods);
        }

    	$redirectURL = urlencode(urlencode($_SERVER['REQUEST_URI']));
    	$this->assign("redirectURL",$redirectURL);
        $this->display("search");
    }

    /**
     * 价钱排序
     * @param array $arrays待排序数组 
     * @param int $order 0为升序 1为降序
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
