<?php
namespace Home\Controller;
use Think\Controller;
class IntroductionController extends Controller {
    //商品详细页面
    public function index(){
    	$goods_id = I('get.id','',int);
    	$goods = M('goods')->find($goods_id);  //获取商品的共同属性
        $goods_sn = M('goods_specify')->where("goods_id={$goods_id}")->getField("goods_sn");

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
        if( session('?id') ){   //当用户在登录状态时，统计购物车商品数量
            $different_goods = M('shopcart')->where("user_id=".session('id'))->Count();    //统计购物车不同商品数量
            $this->assign("different_goods",$different_goods);
        }
        // $this->assign('description',$description);
    	$this->assign('goods',$goods);

        $comment_model = M("comment");
        $comment_num = $comment_model->where("goods_id={$goods_id}")->count();
        $good_comment_num = $comment_model->where("goods_id={$goods_id} AND comment_type='"."好评'")->count();
        $mid_comment_num = $comment_model->where("goods_id={$goods_id} AND comment_type='"."中评'")->count();
        $bad_comment_num = $comment_model->where("goods_id={$goods_id} AND comment_type='"."差评'")->count();
        $this->assign("total_num",$comment_num);
        $this->assign("good_num",$good_comment_num);
        $this->assign("mid_num",$mid_comment_num);
        $this->assign("bad_num",$bad_comment_num);

        /* 总评价内容 */
        $comment = $comment_model->where("goods_id={$goods_id}")->select();
        foreach($comment as $key => $val){
            $user_id = $val['user_id'];
            $header_img = M("user")->where("id={$user_id}")->getField("header_img");  //获取用户头像地址
            $comment[$key]['header_img'] = $header_img;
            $comment[$key]['picture'] = unserialize($comment[$key]['picture']); //反序列化评价图片地址
            $comment[$key]['user_name'] = substr_replace($comment[$key]['user_name'],"***",1,2); //用户名设置为匿名
        }
        $this->assign('comment',$comment);

        /* 好评内容 */
        /* $good_comment = $comment_model->where("goods_id={$goods_id} AND comment_type='"."好评'")->select();
        foreach($good_comment as $key => $val){
            $user_id = $val['user_id'];
            $header_img = M("user")->where("id={$user_id}")->getField("header_img");  //获取用户头像地址
            $good_comment[$key]['header_img'] = $header_img;
            $good_comment[$key]['user_name'] = substr_replace($good_comment[$key]['user_name'],"***",1,2); //用户名设置为匿名
        }
        $this->assign('good_comment',$good_comment);*/
        $redirectURL = $_SERVER['REQUEST_URI']; //获取当前页面的url，以便重定向使用
        $redirectURL = urlencode($redirectURL);
        $this->assign('redirectURL',$redirectURL);
    	$this->display('introduction');
    }



}
