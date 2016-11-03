<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>退款详情</title>
<link href="/Public/Admin/css/page.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/css/main.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/css/webmallDialog.css" rel="stylesheet" type="text/css" />
<style>
.add_title_img {
   
    height: 35px;
    padding: 5px 5px;
    position: relative;
}
.add_title_img #title_img {
    border: 2px solid #c1c1c1;
    float: left;
    height: 30px;
    width: 50px;
}
.add_title_img #title_img img {
    height: 30px;
    width: 50px;
}
a.title_text {
    color: #999;
    float: left;
    letter-spacing: 2px;
    line-height: 35px;
    padding-left: 15px;
}

.eventlink{
  color: #fff;
    float: left;
    font-weight: 600;
    height: 32px;
    line-height: 32px;
    margin-right: 10px;
    padding: 0 10px;
    text-align: center; border-radius:3px; background:#09C;
  cursor:pointer
}
#title {width:450px;}
#ad_img {position:relative;top:-5px; display:none;}
#img-view {display:inline-block;border: 1px solid #CCC;position:relative;top: 7px;}
#img-view img {width: 60px;height:32px;}
#add_file {width: 70px;}
#img-box img{
    display:block;
    float:left;
}
#img-box a{
    display:block;
    width:12px;
    height:12px;
    line-height:12px;
    font-size: 12px;
    color:orange;
    text-align:center;
    position:relative;
    top:0px;
    left:68px;
    cursor: pointer;
    border:1px orange solid; 
    border-radius:50%;
}
.type_content{
    width:700px;
    height:30px;
    display:block;
    margin-top:4px;
}
.info_content{
    width:120px;
    margin-left:10px;
    border:1px dashed grey;
    float:left;
   
}

.special_color{color:orange;}
</style>
</head>
<body bgcolor="#F7F7F7">
<div class="content">
  
    <div class="content_top">&nbsp;&nbsp;&nbsp;现在的位置为：订单管理-&gt;退款详情</div>
    <div class="m_content">
      <div class="keywords_show"></div>
        <div class="real_c">
            
            <?php if($errno != null): ?><p class="tip <?php echo ($errno["style"]); ?>"><?php echo ($errno["str"]); ?><span onclick="$(this.parentNode).slideUp();">X</span></p><?php endif; ?>
           

            <div class="s-space"></div>

          <div>
              
            
            <table border="0" cellpadding="0" cellspacing="0" id="add_table" width="100%">
                <tr>
                    <td class="left_td">订单号：</td>
                    <td class="right_td"><div class="input" style="border:none;color:red;font-size:20px;"><?php echo ($refund_detail["0"]["order_id"]); ?></div></td>
                </tr>
                <tr>
                  <td class="left_td">用户名：</td>
                  <td class="right_td"><?php echo ($refund_detail["0"]["username"]); ?></td>
                </tr>
                
                <?php if(is_array($goods_detail)): foreach($goods_detail as $index=>$single): ?><tr >
                      <td class="left_td">商品<a style="color:red;font-size:18px;"><?php echo ($index+1); ?></a>名称：</td>
                      <td class="right_td"><?php echo ($single["goods_name"]); ?></td>
                  </tr>
                  <tr>
                      <td class="left_td">序列号：</td>
                      <td class="right_td" id="goods_type">
                          <div class="input" style="border:none;"><?php echo ($single["goods_sn"]); ?></div>
                      </td>
                  </tr>
                  <tr>
                      <td class="left_td">单价：</td>
                      <td class="right_td" id="goods_type">
                          <div class="input" style="border:none;"><a class="special_color"><?php echo ($single["goods_price"]); ?></a>元</div>
                      </td>
                  </tr>
                  <tr>
                      <td class="left_td">购买数量：</td>
                      <td class="right_td" id="goods_type">
                          <div class="input" style="border:none;">x<a class="special_color"><?php echo ($single["goods_num"]); ?></a></div>
                      </td>
                  </tr>
                  <tr>
                      <td class="left_td">该商品总额：</td>
                      <td class="right_td" id="goods_type">
                          <div class="input" style="border:none;"><a class="special_color"><?php echo ($single["this_total"]); ?></a>元</div>
                      </td>
                  </tr>
                  <tr>
                      <td class="left_td">相关规格及图片：</td>
                      <td class="right_td">
                        <div class="type_content">
                          <div class="input info_content" >   
                            <?php echo ($single["goods_type1"]); ?>:<a class="special_color"><?php echo ($single["goods_type"]); ?></a>
                          </div>
                          <div class="input info_content">
                            <?php echo ($single["goods_type2"]); ?>:<a class="special_color"><?php echo ($single["goods_package"]); ?></a></div>
                        </div>
                        <img  style="display:block;width:100px;height:100px;margin-bottom:10px;" src="<?php echo ($single["goods_thumb"]); ?>" />
                      </td>
                  </tr>
                  <!-- 退款凭证 -->
                  <tr>
                    <td class="left_td">退款凭证：</td>
                    <td class="right_td">
                    <?php foreach($refund_detail[$index]['path'] as $vo){ echo '<img style="display:block;width:200px;height:200px;margin-bottom:10px;float:left;" src="'.$vo.'" />'; } ?>
                    </td>
                  </tr>
                  <!-- 退款类型 -->
                  <tr>
                    <td class="left_td">退款类型：</td>
                    <td class="right_td"><?php echo ($refund_detail["$index"]["refund_reason"]); ?></td>
                  </tr>
                  <!-- 退款金额 -->
                  <tr>
                    <td class="left_td">退款金额：</td>
                    <td class="right_td"><a style="color:red;font-size:16px;"><?php echo ($refund_detail["$index"]["refund_money"]); ?></a>元</td>
                  </tr>
                  <!-- 退款说明 -->
                  <tr>
                    <td class="left_td">退款说明：</td>
                    <td class="right_td">
                      <div style="width:480px; height:80px;font-size:14px;border:dashed 1px grey;" name="goods_brief" class="input" >
                      <?php echo ($refund_detail["$index"]["refund_info"]); ?>
                    </div>
                    </td>
                  </tr>
                  <?php if(($order_info["status"]) == "0"): ?><tr>
                  <td class="left_td">修改总费用→</td>
                  <td class="right_td">
                    <input type="text" class="input" style="width:80px;color:red;font-size:16px;float:left;">元
                    <a href="javascript:void(0)" onclick="edit_money(this)" class="eventlink" style="height:30px;line-height:30px;margin-left:20px;float:none;">修改</a>
                  </td>
                  </tr><?php endif; ?>

                  <tr>
                    <td class="left_td">退款：</td>
                    <td class="right_td">
                      <input type="hidden" value="<?php echo ($refund_detail["$index"]["id"]); ?>" />
                      <a href="javascript:void(0)" onclick="agreeRefund(this,'yes')" class="eventlink" style="height:30px;line-height:30px;margin-left:20px;float:none;">同意退款</a>
                      <a href="javascript:void(0)" onclick="agreeRefund(this,'no')" class="eventlink" style="height:30px;line-height:30px;margin-left:20px;float:none;">拒绝退款</a>
                    </td>
                  </tr><?php endforeach; endif; ?>
                <tr>
                    <td class="left_td">订单状态：</td>
                    <td class="right_td">
                    <a style="color:red;font-size:16px;">
                    <?php switch($order_info["status"]): case "0": ?>待付款<?php break;?>
                    <?php case "1": ?>待发货<?php break;?>
                    <?php case "2": ?>待收货<?php break;?>
                    <?php case "3": ?>待评价<?php break;?>
                    <?php case "4": ?>已评价<?php break;?>
                    <?php case "9": ?>订单已取消<?php break; endswitch;?>
                    </a>
                    </td>
                </tr>
                <!-- 操作按钮 -->
                <tr><td colspan="4" valign="bottom" align="center"><div class="formHandleBox" style="padding-left:100px;">
                    <input type="hidden" name="act" value="add" />
                    <a href="javascript:window.history.go(-1);" class="eventlink">返回</a>
                </div></td></tr>
            </table>

            </div>
        </div>
    </div>
    <div class="b_border"></div>
    
</div>
<script type="text/javascript" src="/Public/Admin/js/jquery.min.js"></script>
<script language="javascript">
/**
 * 修改费用
 */
function edit_money(obj){
  var money = $(obj).prev().val();
  if(isNaN(money) || money<=1){
    alert("请输入合法的价钱");
    return;
  }
  var bool = window.confirm("您确认把订单总额从<?php echo ($order_info["total_money"]); ?>元改为"+money+"元吗？");
  if(bool!=true) return;
  var order_id = "<?php echo ($order_info["order_id"]); ?>";
  $.get('/Api/Order/edit_money',{order_id:order_id,money:money},function(ret){
    if(ret == 1){
      alert("修改订单总价成功！");
      window.location.href="<?php echo ($_SERVER['REQUEST_URI']); ?>";
    } 
  });
}

/**
 *同意或拒绝退款
 */
function agreeRefund(obj,adjustment){
  //同意退款
  if( adjustment == 'yes' ){
    var bool = window.confirm("确定同意此商品的退款吗？");
    if(bool!=true) return;
    var refund_id = $(obj).prev().val();
    $.get('/Api/Order/agreeRefund?act=agree',{refund_id:refund_id},function(ret){
      if(ret==1){
        alert("同意此退款成功！");
        window.location.href="<?php echo ($_SERVER['REQUESR_URI']); ?>";
      }else{
        alert("操作失败！");
      }
    });
  }

  //拒绝退款
  if( adjustment == 'no' ){
    var bool = window.confirm("残忍地拒绝此退款申请吗？");
    if( bool != true) return;
    var refund_id = $(obj).siblings("input").val();
    var order_id = "<?php echo ($_GET['order_id']); ?>";
    $.get('/Api/Order/agreeRefund?act=refuse',{refund_id:refund_id,order_id:order_id},function(ret){
      if(ret==1){
        alert("拒绝退款成功！");
        window.location.href="<?php echo ($_SERVER['REQUESR_URI']); ?>";
      }else{
        alert("操作失败！");
      }
    });
  }
}
</script>
</body>
</html>