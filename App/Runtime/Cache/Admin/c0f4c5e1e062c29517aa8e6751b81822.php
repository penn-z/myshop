<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>评论列表</title>
<link href="/Public/Admin/css/page.css" rel="stylesheet" type="text/css"/>
<link href="/Public/Admin/css/main.css" rel="stylesheet" type="text/css"/>
<link href="/Public/Admin/css/page.css" rel="stylesheet" type="text/css"/>
<link href="/Public/Admin/css/webmallDialog.css" rel="stylesheet" type="text/css" />

<style type="text/css">
#check,.checkall-box label {cursor:pointer;}
.checkall-box {margin-left:20px;margin-top:10px;}
.pilian{display:inline-block;cursor: pointer; background:#06c; border-radius:3px; height:20px;  text-align:center; padding:0 10px; margin-left:10px; color:#fff; line-height:20px;}
.sel{ height: 30px; width: 80px; margin-left:10px; background:#d7d7d7}
.tr_list_page{  font-size: 12px; height: 24px; background-color: #EBEBEB; border: 1px solid #FFF;}
.tr_list{font-size: 12px; height: 24px; background-color: #FFF; border: 1px solid #FFF;}
.tr_list a{color:blue;text-decoration:none;}

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
    font-weight: 600;
    height: 32px;
    line-height: 32px;
    margin-right: 10px;
    padding: 0 10px;
    text-align: center; border-radius:3px; background:#09C;
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
.tr_list .reset{display:block;background:#00597F;color:#fff;width:60px;font-size:12px;margin:0px auto;}
</style>
</head>

<body bgcolor="#F7F7F7">
<div class="content">

    <div class="content_top">&nbsp;&nbsp;&nbsp;现在的位置为：管理-&gt;评论列表</div>

    <div class="m_content">

        
          <form action="/index.php/Admin/Comment/list" method="get" class="form" name="search" id="list-form">
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
        	<tr class="tr_top">
              <td width="5%">商品id</td>
              <td width="10%">商品名称</td>
              <td width="5%">商品缩略图</td>
              <td width="5%">评价总数</td>
              <td width="5%">好评数</td>
              <td width="5%">中评数</td>
              <td width="5%">差评数</td>
              <td width="5%">好评率</td>
              <td width="5%">操作导航</td>
        	</tr>
          <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr class="tr_list">
            <td><?php echo ($vo["goods_id"]); ?></td>  
            <td><?php echo ($vo["goods_name"]); ?></td>  
            <td><img src="<?php echo ($vo["goods_thumb"]); ?>" width="60px" height="60px"/></td>  
            <td><?php echo ($vo["total_comment"]); ?></td>  
            <td><a style="color:green;"><?php echo ($vo["good_comment_num"]); ?></a></td>  
            <td><a style="color:blue;"><?php echo ($vo["mid_comment_num"]); ?></a></td>  
            <td><a style="color:red;"><?php echo ($vo["bad_comment_num"]); ?></a></td>  
            <td><?php echo ($vo["good_percentage"]); ?>%</td>
            <td style="text-align:center;">
              <a href="/Admin/Comment/comment_info.html?goods_id=<?php echo ($vo["goods_id"]); ?>" class="eventlink reset" id="<?php echo ($vo["id"]); ?>" style="text-decoration: none;">查看详情</a>
            </td>
          </tr><?php endforeach; endif; ?>
          <tr><td>&nbsp;</td></tr>
          <tr><td class="page_menu" colspan="12" valign="bottom">
              <div style="padding:15px 50px 0px 0px;float:right;">
                <?php echo ($page); ?>
              </div>
          </td></tr>
        </table>
      </div>
    </div>
  <div class="b_border"></div>
</div>
<script type="text/javascript" src="/Public/Admin/js/jquery.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/window.js"></script>
<script language="javascript" src="/Public/Admin/js/JWin.js"></script>
<script type="text/javascript">

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
</script>
</body>
</html>