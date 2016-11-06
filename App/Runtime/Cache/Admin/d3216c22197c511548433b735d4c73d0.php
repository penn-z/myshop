<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员列表</title>
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

.code_background{
  position:fixed;
  display:none;
  width:98%;
  height:100%;
  background:#000;
  opacity:0.8;
  z-index:99;
}
.code_reset{
  position:absolute;
  left:42%;
  top:32%;
  width:300px;
  height:150px;
  border-radius:2%;
  border-top:#00597F 20px solid;
  background:#fff;
  z-index:100;
}
.code_reset .wrap{
  position:absolute;
  width:300px;
  height:20px;
  bottom:2%;
}
.code_reset .wrap span{
  display:block;
  float:left;
  margin-left:66px;
  width:50px;
  height:20px;
  line-height:20px;
  color:#fff;
  font-size:16px;
  font-weight:500;
  text-align:center;
  background:#00597F;
  cursor:pointer;
}
.code_reset .word{
  position:absolute;
  top:40%;
  left:8%;
  width:100px;
  height:26px;
  line-height: 26px;
  font-size:12px;
}
.code_reset .code_input{
  position:absolute;
  top:40%;
  left:40%;
  width:120px;
  height:26px;
  color:#000;
  font-size:14px;
  border:1px solid #0D87C5;
  background:#EEEEEE;
}
</style>
</head>

<body bgcolor="#F7F7F7">
<div class="content">

    <div class="content_top">&nbsp;&nbsp;&nbsp;现在的位置为：管理员管理-&gt;</div>

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
        	<tr class="tr_top">
              <td width="5%">ID</td>
              <td width="5%">管理员用户名</td>
              <td width="5%">管理员账号</td>
              <td width="10%">管理员注册时间</td>
              <td width="5%">管理员权限</td>
              <td width="3%">状态</td>
              <td width="10%">操作导航</td>
        	</tr>
          <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr class="tr_list">
            <td><?php echo ($vo["id"]); ?></td>  
            <td><?php echo ($vo["name"]); ?></td>  
            <td><?php echo ($vo["account"]); ?></td>  
            <td><?php echo (date("Y-m-d H:i:s",$vo["addtime"])); ?></td>
            <td>
              <?php if(($vo["power"]) == "0"): ?>普通权限
              <?php else: ?>
                <a style="color:orange;text-decoration:none;">超级权限</a><?php endif; ?>
            </td>
            
            <td>
              <?php if(($vo["is_block"]) == "0"): ?><a style="color:green;text-decoration:none;">正常</a>
              <?php else: ?>
                <a style="color:red;text-decoration:none;">冻结</a><?php endif; ?>
            </td> 

            <td style="text-align:center;">
            <a href="/Admin/Account/edit?act=edit&id=<?php echo ($vo["id"]); ?>" >编辑</a> 
            <?php if($vo["power"] == 0): ?>| <a href="javascript:void(0)" id="<?php echo ($vo["id"]); ?>" onclick="reset_code(this.id,'block')">冻结</a> 
              | <a href="javascript:void(0)" id="<?php echo ($vo["id"]); ?>" onclick="reset_code(this.id,'unblock')">解封</a> 
              | <a href="javascript:void(0)" id="<?php echo ($vo["id"]); ?>" onclick="reset_code(this.id,'delete')">删除</a><?php endif; ?>
            </td> 
          </tr><?php endforeach; endif; ?>
          <div class="code_background">
            <div class="code_reset">
              <div class="word">超级管理员密码:</div>
              <input type="password" class="code_input"/>
              <div class="wrap">
                <span onclick="save_operata()">确定</span>
                <span onclick="cancel()">取消</span>
              </div>
            </div>
          </div>
            
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
function delAlert(){
  var bool = window.confirm("你确定要删除管理员吗？");
  if( bool != true ) return false;
  return true;
}

/**
 * 冻结、解封、删除操作
 * @param int id 账户id,string act 动作
 */
function reset_code(id,act){
  $(".code_background").find(".code_input").attr("id",id);
  $(".code_background").find(".code_input").attr("act",act);
  $(".code_background").show();
}

/**
 * 取消操作
 */
function cancel(){
  $(".code_background").find(".code_input").val("");
  $(".code_background").hide();
}

/**
 * 提交操作修改
 */
function save_operata(){
  var bool = window.confirm("确认要进行此操作吗？");
  if( bool!=true ) return;
  var act = $(".code_background").find(".code_input").attr("act");
  var account_code = $(".code_background").find(".code_input").val();
  $.get('/Api/Admin/validateCode',{code:account_code},function(ret){
    if(ret==0){
      alert("密码错误");
      return;  //返回结果为0，超级管理员密码输入错误    
    } 
    var id = $(".code_background").find(".code_input").attr("id");  //被操作的管理员id
    if( act=='block' ){
      $.get('/Api/Admin/operate',{id:id,act:act},function(ret){
        if(ret==1) alert("冻结成功");
        else alert("冻结失败");
      });
    }else if( act=='unblock' ){
      $.get('/Api/Admin/operate',{id:id,act:act},function(ret){
        if(ret==1) alert("解封成功");
        else alert("解封失败");
      });
    }else{
      var bool = window.confirm("此为删除操作，确定吗？");
      if(bool!=true) return;
      $.get('/Api/Admin/operate',{id:id,act:act},function(ret){
        if(ret==1) alert("删除成功");
        else alert("删除失败");
      });
    }
    $(".code_background").find("input").val("");
    $(".code_background").hide();
    window.location.href="/Admin/Account/showList/p/<?php echo ($_GET['p']); ?>";
  });
}
</script>
</body>
</html>