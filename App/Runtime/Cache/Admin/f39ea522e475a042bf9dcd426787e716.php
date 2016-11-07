<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>订单列表</title>
<link href="/Public/Admin/css/page.css" rel="stylesheet" type="text/css"/>
<link href="/Public/Admin/css/main.css" rel="stylesheet" type="text/css"/>
<link href="/Public/Admin/css/webmallDialog.css" rel="stylesheet" type="text/css" />

<style type="text/css">
#check,.checkall-box label {cursor:pointer;}
.checkall-box {margin-left:20px;margin-top:10px;}
.pilian{display:inline-block;cursor: pointer; background:#06c; border-radius:3px; height:20px;  text-align:center; padding:0 10px; margin-left:10px; color:#fff; line-height:20px;}
.sel{ height: 30px; width: 80px; margin-left:10px; background:#d7d7d7}
.tr_list_page{  font-size: 12px; height: 24px; background-color: #EBEBEB; border: 1px solid #FFF;}
.tr_list{font-size: 12px; height: 24px; background-color: #FFF; border: 1px solid #FFF;}
.tr_list a{color:blue;text-decoration:none;}
.tr_list a:hover{color:orange;}
.inp{ width: 300px; height: 30px; border:1px solid #666; padding-left: 5px;}
.sub{background: #06c; padding:0 15px; height:30px; text-align: center; color: #fff; line-height: 30px; cursor: pointer; border-radius: 3px }
a.tui{ color:#f00}
.level-type {background: rgba(0, 0, 0, 0) none repeat scroll 0 0;border: 1px solid #ccc;padding: 5px;margin-right:20px }
.form{ float:left; margin-bottom: 10px }
.add_title_img {

    height: 35px;
    padding: 5px 5px;
    float: left;
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
.add_file {
    height: 35px;
    left: 20px;
    opacity: 0;
    position: absolute;
    top: 15px;
    width: 50px;
}

.eventlink{
  color: #fff;
    float: left;
    font-weight: 600;
    height: 32px;
    line-height: 32px;
    margin-right: 10px;
    padding: 0 10px;
    text-align: cente; border-radius:3px; background:#09C;
  cursor:pointer
}
#face_img{
    border: 2px solid #c1c1c1;
    float: left;
    height: 30px;
    width: 50px;
}
#face_img img {
    height: 30px;
    width: 50px;
}
.checkall-box{ float:left;}
.pilian{float: left; margin-top:10px;}
</style>
</head>

<body bgcolor="#F7F7F7">
<div class="content">

    <div class="content_top">&nbsp;&nbsp;&nbsp;现在的位置为：订单管理-&gt;订单列表</div>

    <div class="m_content">

        <div class="real_c">
          <?php if(isset($errno) && $errno != null): ?><p class="tip <?php echo ($errno["style"]); ?>"><?php echo ($errno["str"]); ?><span onclick="$(this.parentNode).slideUp();">X</span></p><?php endif; ?>
            <div class="s-space"></div>
        	</div>
          <form action="/index.php/Admin/Order/list" method="get" class="form" name="search" id="list-form">
              <input type="hidden" value="" name="status">
              <input type="hidden" value="" name="type">
              <input type="hidden" value="" name="order_type">
              <input type="hidden" value="" name="cate_id" id="cate_id">
              <input type="text" class="inp" value="" name="keyword" placeholder="请输入搜索的昵称或者微信号" />
              <input type="button" class="sub" value="搜索" onclick="list_form_sub()"/>
          <div style="float:left;margin:0px 0px 10px 60px; ">
      筛选类别:
            <select onchange="do_select(this)"  class="level-type" id="level-type">
                <option value="">--全部分类--</option>
                <option value="<?php echo ($list["id"]); ?>" ></option>
               
            </select>
             
              排序条件:
              <select onchange="do_select(this)" class="level-type"  id="level-type_order">
                 
                  <option value=""></option>
             
              </select>
             
          </div>
        </form>
				<table class="table_content">
                	<form name="goodsForm" method="post" action="#">
                	<tr class="tr_top">
                      <td width="5%">订单号</td>
                      <td width="3%">购物会员</td>
                      <td width="5%">订单生成时间</td>
                      <td width="3%">货品总额</td>
	                    <td width="3%">快递</td>
                      <td width="5%">运费</td>
                      <td width="5%">收货人</td>
                      <td width="5%">联系电话</td>
	                    <td width="10%">收货地址</td>
                      <td width="10%">订单状态</td>
                      <td width="3%" >退款申请</td>
	                    <td width="5%">操作导航</td>
                	</tr>
                  <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr class="tr_list">
                    <td><?php echo ($vo["order_id"]); ?></td>  
                    <td><?php echo ($vo["buyer_name"]); ?></td>  
                    <td><?php echo (date("Y-m-d H:i:s",$vo["addtime"])); ?></td>  
                    <td><?php echo ($vo["total_money"]); ?></td>  
                    <td><?php echo ($vo["express_style"]); ?></td>  
                    <td><?php echo ($vo["express_fee"]); ?></td>
                    <td><?php echo ($vo["receiver"]); ?></td>
                    <td><?php echo ($vo["phone"]); ?></td>
                    <td><?php echo ($vo["province"]); echo ($vo["city"]); echo ($vo["district"]); echo ($vo["street"]); ?></td>
                    <?php if($vo["status"] == 0): ?><td>待付款 | <a href="/Admin/order/fee_change.html?order_id=<?php echo ($vo["order_id"]); ?>" target="_blank">更改费用</a></td>
                    <?php elseif($vo["status"] == 1): ?>
                      <?php if(($vo["remind_sent"]) == "0"): ?><td>待发货 | <a style="cursor:pointer;" onclick="sentOrder(this)" >发货</a></td>
                      <?php else: ?>
                        <td>待发货 | <a style="cursor:pointer;" onclick="sentOrder(this)" >发货</a> | <a style="color:red;">买家催货</a></td><?php endif; ?>
                    <?php elseif($vo["status"] == 2): ?>
                      <td>待收货</td>
                    <?php elseif($vo["status"] == 3): ?>
                      <td><a style="color:green;">待评价</a></td>
                    <?php elseif($vo["status"] == 4): ?>
                      <td><a style="color:green;">已评价</a></td>
                    <?php elseif($vo["status"] == 5): ?>
                      <td><a style="color:red;">退款成功</a></td>
                    <?php elseif($vo["status"] == 9): ?>
                      <td><a style="color:red;">订单已取消</a></td><?php endif; ?>
                    <td>
                      <?php if(($vo["is_refund"]) == "0"): ?>无
                      <?php else: ?>
                        <a href="/Admin/order/showRefund?order_id=<?php echo ($vo["order_id"]); ?>" style="cursor:pointer;color:red;">有</a><?php endif; ?>
                    </td>
                    <td style="text-align:center;">
                    <a href="/Admin/order/order_info.html?order_id=<?php echo ($vo["order_id"]); ?>">详情</a> |
                    <a href="#" target="_blank">编辑</a>
                    </td>  
                  </tr><?php endforeach; endif; ?>
                        <tr><td>&nbsp;</td></tr>
                        <tr><td class="page_menu" colspan="12" valign="bottom">
                            <div style="padding:15px 50px 0px 0px;float:right;">
                              <?php echo ($page); ?>
                            </div>
                        </td></tr>
                    </form>
                </table>
            </div>
        </div>
    </div>
    <div class="b_border"></div>
</div>
<script type="text/javascript" src="/Public/Admin/js/jquery.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/window.js"></script>
<script language="javascript" src="/Public/Admin/js/JWin.js"></script>
<script type="text/javascript">
/**
 * 发货
 */
function sentOrder(obj){
  var bool = window.confirm("确定发货吗？");
  if( bool != true ) return;
  var order_id = $(obj).parents("tr").children().eq(0).text();
  $.get('/Api/Order/sentOrder',{order_id:order_id},function(ret){
    if(ret == 1){
      alert("发货成功!");
      window.location.href="/Admin/order/showlist/p/<?php echo ($_GET['p']); ?>.html"; //跳转后依然跳到指定页码
    }else{
      alert("发货失败");
    }
  });
}

function delAlert(){
  var bool = window.confirm("你确定要删除订单吗？");
  if( bool != true ) return false;
  return true;
}

$(document).ready(function(){
	$('#check').click(function(){
		$('input[name^=id]').attr('checked',this.checked);
	});
});


function list_form_sub(){

    if(verificate()){
         $('#list-form').submit();
    }
}

function previewImg(input) {
  if (input.files && input.files[0]) {
    if(input.files[0].size<2097152) {
      var reader = new FileReader();
      reader.onload = function (e) {
        //加入到预览图
        $('#thumb').attr('src', e.target.result);
        $('#hid_img').val(e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }else{
      input.value="";
      PromptHide('图片大小不能超出2M');
    }
  }
}


$("#add_file").change(function(){
  previewImg(this);
});

function verificate(){
  var sel=$(".sel").val();
  var tex=$(".inp").val();
  if(tex==''){
      return true;
  }
  return true;
}





function category(id)
{
    var category_id=$("#c"+id).val();
    var cate=$("#c"+id).find("option:selected").text();
   $.post('/admin/gzh/ajax_cate_update',{cate_id:category_id,id:id},function  (da) {
    if(da.status==true)
    {
        JWin.lock.work(1000);
        JWin.tip.work('ok','ok',200,1000);
    }
    else
    {
        JWin.lock.work(1000);
        JWin.tip.work('error','error',200,1000);
    }
   },'json')
//  }
}

function delarticle(id,status){
    var bool = window.confirm("您确定要进行该操作吗？");

    if(bool==true){
        $.post('/admin/gzh/delgzh',{id:id,status:status},function  (da) {
            if(da.status==true){
                $("#tr"+id).slideUp();
                JWin.lock.work(1000);
                if(status == 1){
                    JWin.tip.work('恢复成功','ok',200,1000);
                }else{

                    JWin.tip.work('删除成功','ok',200,1000);
                }
            }else{
                JWin.lock.work(1000);
                if(status == 1){
                    JWin.tip.work('恢复失败','ok',200,1000);
                }else{

                    JWin.tip.work('删除失败','ok',200,1000);
                }
            }
        },'json')
    }
}
</script>
</body>
</html>