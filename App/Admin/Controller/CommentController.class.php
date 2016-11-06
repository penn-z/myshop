<?php
namespace Admin\Controller;
use Think\Controller;
class CommentController extends CheckLoginController {
    /**
     * 显示评论列表
     */
    public function showCommentList(){
        $list = M('comment');
        $count      = $list->order("goods_id asc")->count('DISTINCT goods_id');// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(10)
        $Page->rollPage = 5;    //显示的页码数
        unset($Page->parameter['act']);     //删除act动作，这样删除成功一次后就不会就带参数传递了
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $result = $list->order("goods_id asc")->group("goods_id")->field("goods_id")->limit($Page->firstRow.','.$Page->listRows)->select();    //以goods_id为分组，得出每个goods_id的评论情况
        //对每个id进行评价合并处理
        foreach($result as $key => $val){
            $good_comment_num = $list->where("comment_type='好评' AND goods_id=".$val['goods_id'])->count();
            $mid_comment_num = $list->where("comment_type='中评' AND goods_id=".$val['goods_id'])->count();
            $bad_comment_num = $list->where("comment_type='差评' AND goods_id=".$val['goods_id'])->count();
            $total_comment = $good_comment_num + $mid_comment_num + $bad_comment_num;  //该id商品评价总数
            $good_percentage = $good_comment_num / $total_comment;  //好评率
            $goods_name = M("goods")->where("goods_id=".$val['goods_id'])->getField("goods_name");  //商品名称
            $goods_thumb = M("thumb")->where("goods_id=".$val['goods_id'])->getField("small");    //略缩图
            $goods_thumb = unserialize($goods_thumb);
            $result[$key]['goods_name'] = $goods_name;
            $result[$key]['goods_thumb'] = $goods_thumb[0];
            $result[$key]['total_comment'] = $total_comment;
            $result[$key]['good_comment_num'] = $good_comment_num;
            $result[$key]['mid_comment_num'] = $mid_comment_num;
            $result[$key]['bad_comment_num'] = $bad_comment_num;
            $result[$key]['good_percentage'] = number_format(round($good_percentage *100,2),2,'.','');
        }
        $this->assign('page',$show);    //渲染分页导航
        $this->assign('list',$result);  //渲染每页内容
        $this->display("comment_list"); //输出模板
    }

    /** 
     * 评论详情
     */
    public function comment_info(){
        $goods_id = I("get.goods_id");

        $list = M("comment");
        $count      = $list->where("goods_id={$goods_id}")->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(5)
        $Page->rollPage = 5;    //显示的页码数
        unset($Page->parameter['act']);     //删除act动作，这样删除成功一次后就不会就带参数传递了
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $comment = $list->where("goods_id={$goods_id}")->limit($Page->firstRow.','.$Page->listRows)->select();    //以goods_id为分组，得出每个goods_id的评论情况

        foreach($comment as $key => $val){
            $user_id = $val['user_id'];
            $header_img = M("user")->where("id={$user_id}")->getField("header_img");  //获取用户头像地址
            $comment[$key]['header_img'] = $header_img;
            $comment[$key]['picture'] = unserialize($comment[$key]['picture']); //反序列化评价图片地址
            $comment[$key]['user_name'] = substr_replace($comment[$key]['user_name'],"***",1,2); //用户名设置为匿名
        }
        $this->assign("comment",$comment);
        $this->assign("page",$show);
    	$this->display("comment_info");
    }

}