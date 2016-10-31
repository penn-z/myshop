<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>分类列表</title>
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

    <div class="content_top">&nbsp;&nbsp;&nbsp;现在的位置为：分类列表-&gt;</div>

    <div class="m_content">

        <div class="real_c">
          <?php if($errno != null): ?><p class="tip <?php echo ($errno["style"]); ?>"><?php echo ($errno["str"]); ?><span onclick="$(this.parentNode).slideUp();">X</span></p><?php endif; ?>
          <div class="s-space"></div>
        	</div>
          <form action="/admin/gzh/glist" method="get" class="form" name="search" id="list-form">
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
                <option value="<?=$val.id?>" ></option>
               
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
                      <td width="5%">ID</td>
                      <td width="10%">分类名称</td>
                      <td width="10%">分类描述</td>
                      <td width="10%">操作导航</td>
                	</tr>
                  <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr class="tr_list">
                    <td><?php echo ($vo["id"]); ?></td>  
                    <td><?php echo ($vo["category"]); ?></td> 
                    <td><?php echo ($vo["description"]); ?></td> 
                    <td style="text-align:center;">
                      <a href="/admin/category/edit.html?" >编辑</a> |
                      <!-- <a style="cursor:pointer;" >上传图片</a> | -->
                      <a href="javascript:void(0)" onclick="delarticle()">恢复</a> |
                      <a href="/admin/img/showList?act=del&id=<?php echo ($vo["id"]); ?>&p=<?php echo ($_GET['p']); ?>" id="a_del" onclick="return delAlert()">删除</a>
                    </td>  
                  </tr><?php endforeach; endif; ?>
                    <!-- 操作按钮 -->
                    <tr>
                        <td colspan="9" style="padding-top:20px;">
                                <!--<span class="checkall-box"><input type="checkbox" id="check" /><label for="check">全选</label> </span>-->
                                <!--<span class="pilian" href="javascript:void(0)" onclick="pilian('del')">批量删除</span>-->
                        </td>
                    </tr>
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
function delAlert(){
  var bool = window.confirm("你确定要删除该分类吗？");
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

//批量修改图片
function pilianimg(){
  var d = 'img';
  var hidimg = $('#hid_img').val();
  var id = $('input:checkbox[name^=id]:checked').map(function(){
    return $(this).val();
  }).get().join(",");

  if( ! id )
  {
    alert('请选择您要上传图片的项!');
    return;
  }

  var bool = window.confirm("您确定要修改微信头像吗？");
  if ( bool == true )
  {
    location.href = '/admin/gzh/ilist';
  }
}

function do_select(d){
    var cate_id=$("#level-type").val();
    var order_num = $("#level-type_order").val();
    $('input[name="cate_id"]').val(cate_id);
    $('input[name="order_type"]').val(order_num);
    $('#list-form').submit();
}

function pilian( d)
{
	var id = $('input:checkbox[name^=id]:checked').map(function(){
		return $(this).val();
	}).get().join(",");

	if( ! id )
	{
		if ( d == "del" )	alert('请选择要删除的项!');
		if ( d == "pass" )	alert('请选择要恢复的项!');
		return;
	}
	if ( d == "del" )	var bool = window.confirm("您确定要删除您选中的微信号吗？");
	if ( d == "pass" )	var bool = window.confirm("您确定要恢复您选中的微信号吗？");
	if ( bool == true )
	{
		location.href = '/admin/gzh/glist?status=0&ids='+id+'&ast='+d+'&p=';
	}
}

function istui(d,gid)
{
   var act = $(d).attr('act');
    $.post('/admin/gzh/change',{act:act,gid:gid,format:'json'},function  (da) {
        if(da.result == 0 ){
          JWin.lock.work(1000);
          JWin.tip.work('操作成功','ok',200,1000);
          $("#tui"+gid+' a').html(da.is)
          if(act=='notui'){$(d).attr('act','tui');$(d).removeClass('tui')}else{$(d).attr('act','notui');$(d).addClass('tui')}
        }else{
          JWin.lock.work(1000);
          JWin.tip.work('操作失败','error',200,1000);
        }
    },'json')
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